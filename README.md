[![Latest Stable Version](https://poser.pugx.org/jjin/helpers/v/stable)](https://packagist.org/packages/jjin/helpers)
[![Total Downloads](https://poser.pugx.org/jjin/helpers/downloads)](https://packagist.org/packages/jjin/helpers)
[![Latest Unstable Version](https://poser.pugx.org/jjin/helpers/v/unstable)](https://packagist.org/packages/jjin/helpers)
[![License](https://poser.pugx.org/jjin/helpers/license)](https://packagist.org/packages/jjin/helpers)


# **String Helpers**

  

**randomString($limit)**

  

-  *generate a random string*

  

> eg randomString(10) //asdgRttasE

  

  

**randomProductOrderNumber($limit)**

  

- generate a random string,(same as randomString, except returns capitalized output)

  

> eg randomProductOrderNumber(5) //F5CGIJ

  

  

**trimText(string $text, int $maxLength, $trimIndicator = '...')**

  

  

- Trim text at particular length, usable at readmore texts

  

  

> trimText($text, 10, '...')

  

  

**splitName()**

  

Split name string into first_name middle_name last_name

  

  

splitName("jhon abraham") // return array "first_name","last_name","middle_name"

  

  

**generateEmailAddress()**

  

Generate a dummy email address

  

> generateEmailAddress(3,5) // abc@jijin.com

  

  

# Array Helpers

  

**nullRemove($array)**

  

  

- Remove null values from array

  

  

> nullRemove(array $array = [])

  

  

**checkIsArrayValueEmpty($array)**

  

  

- check any value empty in associate array

  

- returns boolean

  

  

>checkIsArrayValueEmpty($array) //retrun true/false

  


  **arrayOrderBy(array  $items, $attr, $order)**
  
  

    orderBy([[],[],[]],'key','desc');
    

**arrayVariadicSum(...$numbers)**'

> Takes an indefinite number of integers and returns their sum

**arrayReject($items, $func)**

> Filters the collection using the given callback.

    reject(['Apple', 'Pear', 'Kiwi', 'Banana'], function ($item) {
    return strlen($item) > 4;
    }); // ['Pear', 'Kiwi']

  
  **arrayTake($items, $remove_from_beginning_index  =  1)**
  
  

> Returns an array with n elements removed from the beginning.

# File Helper

  

**folderCheck($params)**

  

- Check for a folder exists, if yes return true, else create one and returns true

  

-  > folderCheck('$file path')

  

- -

  

**fileRemove($folderpath)**

  

- Completely remove a file from server

  

>fileRemove($folderpath)

  

  

**fileUpload($key='',$folder='')**

  

- upload files, even support multiple file upload

  

> fileUpload('my_files','uploads/user')

  

  

**JMakeThumbNail( 'sample.jpg', $fileHeight,$fileWidth, 'default.jpg')**

  

  

> As name suggests create Thumbnails of image

  

  

# Time & Date helper

  

  

**timeNow()**

  

- returns current timestamp

  

**timeAgo($time)**

  

- Convert time to times ago string format

  

> timeAgo(time in daytime)

  

**getDayId($week_string)**

  

get week id by passing first letter of the week

  

  

# Debug Helper

  

  

Useful functions to easyly debug your codes

  

  

- json_output(array $output = [], bool $exit = true, int $httpStatus = 200)

  

Return a prettified json output

  

  

print_j($params,false='')

  

- Prints array with pre codeBlock

  

>print_j($array,false)

  

  

j_log($data = null, string $file_url = null)

  

- Create a Log file in server folder

  

>j_log($data = null, string $file_url = null)

  

  

>json_output(array $output = [], bool $exit = true, int $httpStatus = 200)

  

- echo a string,(same as die function)

  

d_echo(string $var, int $die = 0)

  

>d_echo(string $var, int $die = 0)

  

  

true_response(string $message = '', int $code = 200)

  

- Returns a status true array with passed string and code

  

>true_response(string $message = '', int $code = 200)

  

  

false_response(string $message = '', int $code = 200)

  

- Returns a status false array with passed string and code

  

>false_response(string $message = '', int $code = 200)
