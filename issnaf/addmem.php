<?php
    function request($first, $last, $middle, $email, $phone, $birthdate, $gender, $imgurl, $arrive, $depart, $Linkedin, $Researchgate, $WebPage, $SpecialtyName) {
        


        include 'connect.php';
   
        try {
            $sql =<<<EOF
            SELECT * from person;
EOF;
            $result = $conn->query($sql);
                


                $sql5 =<<<EOF
                SELECT MAX(person_id) as oMAX FROM person;
EOF;
                $ret5=$conn->query($sql5);

                while($row5 = $ret5->fetch_assoc()){
                    $id = $row5['oMAX']+1;
                }
                $sql6 =<<<EOF
                SELECT MAX(discipline_id) as dMAX FROM person;
EOF;
                $ret6=$conn->query($sql6);

                while($row6 = $ret6->fetch_assoc()){
                    $Did = $row6['dMAX']+1;
                }
                $sql7 =<<<EOF
                SELECT MAX(profile_id) as pMAX FROM person;
EOF;
                $ret7=$conn->query($sql7);

                while($row7 = $ret7->fetch_assoc()){
                    $Pid = $row7['pMAX']+1;
                }
                $sql8 =<<<EOF
                SELECT MAX(diaspora_id) as diMAX FROM person;
EOF;
                $ret8=$conn->query($sql8);

                while($row8 = $ret8->fetch_assoc()){
                    $DIid = $row8['diMAX']+1;
                }
                $fullname = $first . ' ' . $middle. ' ' . $last;

                $sql12 =<<<EOF
                
                INSERT INTO `person`(`person_id`, `first_name`, `last_name`, `middle_name`, `full_name`, `primary_email`, `primary_phone`, `birthdate`, `gender`, `image_url`, `na_arrival`, `na_departure`, `linkedin_page`, `researchgate_page`, `web_page`, `specialty_name`, `li_description`, `discipline_id`, `profile_id`, `diaspora_id`, `linkedin_timestamp`) VALUES ($id,'$first','$last','$middle','$fullname','$email','$phone',$birthdate,$gender,'$imgurl',$arrive,$depart,'$Linkedin','$Researchgate', '$WebPage','$SpecialtyName','',$Did,$Pid,$DIid,'')


                                                                                                                                                                                                                                                                                                                                        
EOF;

                $ret12 = $conn->query($sql12);
                
                
                if(!$ret12) {
                    echo "<div style='float:left;width:100%; '>Person already exist!</div>";

                    echo $conn->lastErrorMsg();
                } else {
                    echo "Records created successfully\n";
                    header("Location: homepage.php"); 
                    exit();
                
                }

            $conn->close();
        }
        catch (Exception $e) {
            echo "<h2 style='width:100%; color:#ffffff;text-align:center;'>Database error!</h2><br/>" . $e;
        }
    }
    // Perform action
    request($_GET["first"], $_GET["last"],$_GET["middle"], $_GET["email"], $_GET["phone"], $_GET["birthdate"],$_GET["gender"], $_GET["imgurl"], $_GET["arrive"], $_GET["depart"], $_GET["Linkedin"], $_GET["Researchgate"], $_GET["WebPage"], $_GET["SpecialtyName"]);
?>