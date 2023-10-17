<?php 
    session_start();
    include_once "config.php";
    $fname = mysqli_real_escape_string($_conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($_conn, $_POST['lname']);
    $email = mysqli_real_escape_string($_conn, $_POST['email']);
    $password = mysqli_real_escape_string($_conn, $_POST['password']);

    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
        //lets check users email is valid or not
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){//IF EMAIL IS VALID
            //lets check that email already exist in the databse  or not
            $sql = mysqli_query($_conn, "SELECT email FROM users WHERE email = '{$email}'");
            if(mysqli_num_rows($sql) > 0){//if mail already exist 
                echo "$email - this already exist!";
            }else{
                //lets check user upload file or not
                if(isset($_FILES['image'])){// if file is uploaded
                    $img_name = $_FILES['image']['name'];//getting user upload img name
                    $tmp_name = $_FILES['image']['tmp_name'];//this temporary name is used to save/move file in our folder

                    //lets explode img and get the last extension like jpg png
                    $img_explode = explode('.', $img_name);
                    $img_ext = end($img_explode);//here we get the extension of an userb uploaded img file

                    $extensions = ['png','jpeg', 'jpg', 'JPG', 'JPEG', 'PNG'];//these are some valid img ext and we've store them in array
                    if(in_array($img_ext, $extensions) === true){//if user uploaded img ext is matched with any array extensions
                        $time = time(); //this will return us current time... 

                                        //so all the img file will have a unique name 
                        //ets move the user uploaded img to our particular folder   
                        $new_img_name = $time.$img_name;    

                      if(move_uploaded_file($tmp_name, "images/".$new_img_name)){// if useer upload img move to our folder successfully
                             $status = "active now"; // once user signed up then his status will be active now
                             $random_id = rand(time(), 10000000); //creating random id for user

                             //lets insert all user data inside table
                             $sql2 = mysqli_query($_conn, "INSERT INTO users (unique_id, fname,lname,email,password,img,status)
                                                VALUES({$random_id}, '{$fname}', '{$lname}', '{$email}', '{$password}', '{$new_img_name}', '{$status}')");
                            if($sql2){//if these data inserted
                                $sql3 = mysqli_query($_conn, "SELECT * FROM users WHERE email = '{$email}'");
                                if(mysqli_num_rows($sql3) > 0){
                                    $row = mysqli_fetch_assoc($sql3);
                                    $_SESSION['unique_id'] = $row['unique_id'];//using this session we used user unique_id in other php file
                                    echo "success";
                                }
                            }else{
                                echo "something went wrong!";
                            }
                      }

                    }else{
                        echo "please select an Image file - jpeg , jpg , png!";
                    }

                }else{
                    echo "please select an Image file!";
                }
            }
        }else{
            echo "$email - this is not a valid email!";
        }
    }else{
        echo "all input field are required! ";
    }
?>