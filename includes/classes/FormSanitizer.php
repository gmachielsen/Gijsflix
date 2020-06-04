<?php
class FormSanitizer {
  public static function sanitizeFormString($inputText) { // static hoef je niet de functie opniew aan te roepen met: voorbeeld = new voorbeeld(); voorbeeld->voorbeeldform;
      $inputText = strip_tags($inputText); // what this will do is stripping tags like <> () and so on in the inputfield.
      $inputText = str_replace(" ", "", $inputText); // what this will do is replacing a spacing into "" so that it will strip spaces.
      // $inputText = trim($inputText); // what this will do is trimming every spacing ?? please check
      $inputText = strtolower($inputText); // this will convert string into lower case.
      $inputText = ucFirst($inputText); // This will convert the first letter into uppercase;
      return $inputText;
  }

  public static function sanitizeFormUsername($inputText) { // static hoef je niet de functie opniew aan te roepen met: voorbeeld = new voorbeeld(); voorbeeld->voorbeeldform;
      $inputText = strip_tags($inputText); // what this will do is stripping tags like <> () and so on in the inputfield.
      $inputText = str_replace(" ", "", $inputText); // what this will do is replacing a spacing into "" so that it will strip spaces.
      return $inputText;
  }

  public static function sanitizeFormPassword($inputText) { // static hoef je niet de functie opniew aan te roepen met: voorbeeld = new voorbeeld(); voorbeeld->voorbeeldform;
      $inputText = strip_tags($inputText); // what this will do is stripping tags like <> () and so on in the inputfield.
      return $inputText;
  }

  public static function sanitizeFormEmail($inputText) { // static hoef je niet de functie opniew aan te roepen met: voorbeeld = new voorbeeld(); voorbeeld->voorbeeldform;
      $inputText = strip_tags($inputText); // what this will do is stripping tags like <> () and so on in the inputfield.
      $inputText = str_replace(" ", "", $inputText); // what this will do is replacing a spacing into "" so that it will strip spaces.
      return $inputText;
  }
}
?>
