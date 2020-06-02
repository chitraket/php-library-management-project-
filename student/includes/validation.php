<?php
function name($txtName)
{ 
    if(empty($txtName) || !preg_match("/^[A-Za-z ]*$/",$txtName))
    {
        return true;
    }
    else
    {
      return false;
    } 
}
function enrollment($enrollment)
{ 
    if(empty($enrollment) || !preg_match("/^[0-9]{15}$/",$enrollment))
    {
        return true;
    }
    else
    {
      return false;
    } 
}
function isbn($isbn)
{ 
    if(empty($isbn) || !preg_match("/^[0-9]*$/",$isbn))
    {
        return true;
    }
    else
    {
      return false;
    } 
}
function email($email)
{ 
    if(empty($email) || !filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        return true;
    }   
  else
    {
      return false;
    }
}

function number($number)
{ 
    if(empty($number) || !preg_match("/^[0-9]*$/",$number))
    {
        return true;
    }
    else
    {
      return false;
    } 
}

function images($image)
{
  $ext = pathinfo($image, PATHINFO_EXTENSION);
  $extensions= array("jpeg","jpg","png"); 
  if(!empty($image) && in_array($ext,$extensions)==false)
  {
    return true;   
  }
  else{
    return false;
  }
}
function pass($pass)
{
    if(empty($pass) || !preg_match("/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,20}$/",$pass))
    {
        return true;
    }
    else
    {
      return false;
    }
}

function contacts($contact)
{
    if(empty($contact) || !preg_match("/^[9876][0-9]{9}$/",$contact))
    {
        return true;
    }
    else
    {
      return false;
    }
}


?>