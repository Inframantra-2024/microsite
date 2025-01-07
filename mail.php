<?php
if($_POST) {
    $name = "";
    $email = "";
    $phone = "";
    
    
    if(isset($_POST['name'])) {
        $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    }
    
    if(isset($_POST['email'])) {
        $email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['email']);
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        
    }
    
    if(isset($_POST['phone'])) {
        $phone = filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT);
    }
    // API Integrate
    
    // $leaddata = array (
    //             "LeadName"=> $name,
    //             "Campaign"=> "SEM",
    //             "Source" => "Microsite",
    //             "Subsource" => "Pune Data",
    //             "LeadEmail" => $email,
    //             "LeadPhoneNo" => $phone,
    //           "Message" => "This is Vilas Javdekar microsite Lead ",
    //             "ProjectName" => "Vilas Javdekar",
    // );

    // $ch = curl_init('https://dream-flow-4317.my.site.com/services/apexrest/portallead');
    // curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    // curl_setopt($ch, CURLOPT_POST, 1);
    // curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($leaddata));
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    // curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    // $response = curl_exec($ch);
    // curl_close($ch);
    
     
    $site_title="Ambience Creacion Gurgaon Recieved A Query";
    
     $recipient = "digitalmarketing@inframantra.com";
    
    // $recipient="divyanshu.tripathi@inframantra.com";
    
    
    $from="$site_title <digitalmarketing@inframantra.com>";
    
    $subject="Ambience Creacion Gurgaon Recieved A Query";
    
    
    
    $headers  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type:text/html; charset=iso-8859-1' . "\r\n"
    .'title:'.'Ambience Creacion Gurgaon Recieved a Query'."\r\n"
    .'From: '.$from."\r\n";
    
    $email_content = "<html><body>";
    $email_content .= "<tr><td style='background: #eee; padding: 15px;'>Name:</td><td style='background: #fda; padding: 10px;'>$name</td></tr>";
    $email_content .= "<tr><td style='background: #eee; padding: 15px;'>Email:</td><td style='background: #fda; padding: 10px;'>$email</td></tr>";
    $email_content .= "<tr><td style='background: #eee; padding: 15px;'> Phone:</td><td style='background: #fda; padding: 10px;'>$phone</td></tr>";
    $email_content .= '</body></html>';
    

    
    if(mail($recipient,$subject,$email_content, $headers)) {
        header('Location: thankyou.html');

        // readfile($broucher);
        return;
    } else {
       header('Location:404.html');
       return;
    }
    
} else {
    header('Location:404.html');
}
?>