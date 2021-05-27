# order-form

Task : create an order-form for a sandwich shop in PHP.

Learning objectives

    Be able to tell the difference between the superglobals $_GET, $_POST, $_COOKIE and $_SESSION variable.

    Used the $_POST and $_SESSION superglobals during this assignment. 
    I understand the difference between $_POST and $_GET now and the difference between $_COOKIE 
    and $_SESSION. 
   
    Be able to write basic validation for PHP.
     
    Most validation functions work sort of, could be better for sure. Price calculation not done yet.

    Be able to sent an email with PHP
    
    To be continued? 

OVERALL EXPERIENCE :

I felt like I went too 'basic' in this assignment. What I mean with that is that I tried to
do the assignment without looking anything other than documentation (which in the case of PHP 
is a bit terrible in my humble beginner opinion).
As such I have a wonky structure with a lot, and I mean A LOT of if elses.
Good news is it works sort of and I'm fairly proud of that, especially since its a new language,
bad news is this won't go if I ever have to make an actual validation form as it's incredibly
amateuristic.

4/5 of the requirements have been fulfilled, I ran into some difficulties with the price calculation
other than the express delivery, which still needs fixing.


1) Validation 

Started with email validation. 
Decided to check 3 things, as specified in the assignment :
1. Is the email empty? if(empty(){}
2. Is the emailadress valid? 
elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){}
3. Else, later down the line, save the input email in the session

Did the same structure for the other input fields : checked wether the input is what we want,
if so save it in the session.

Had some issues with a lot of spaces in the input fields on input data to session storage.
Tried to troubleshoot this with coach Tim, but he also had no idea where the empty spaces came from.
We decided to display errors under the text boxes, and after some troubleshooting and using a placeholder
and then storing the data in the input field it seemed to work in order.

2) Saving data so user doesnt have to reinput correct info

Works with the help of the $_SESSION superglobal. Had some issues with data not being saved/being saved
when it should be cleared. The data that was a wrong input had to be cleared, worked well with an unset()
in the else if.

3) Switch between drinks and food.

Was stuck on this one, but my group helped me out by suggesting the $_SERVER['REQUEST_URI'] superglobal.
Shoutout to the League of Losers!

4) Calculate delivery time.

Did this with a simple if else. 

if (isset($_POST['express_delivery'])) {
    $totalValue += 5;
    $deliveryTime = "45 minutes until delivery.";
} else {
    $deliveryTime = "2 hours until delivery.";
}

Don't know if this fulfills the requirement, but it worked on selecting/not selecting the express 
delivery option.

5) Had weird errors on calculation, still have to check this in either this assignment or the OOP review.