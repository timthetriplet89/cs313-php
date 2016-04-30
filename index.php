<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>
        <title>Tim Steele - CS 313</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css_style_sheet.css">
        <script>
//            function myFunction() {
//                //document.getElementById("body_element").getAttribute("background") = 
//                document.body.style.background = "#8CBCE2";
//            }

            function testJavaScript() {
                alert("Yes, JavaScript seems to be working just fine today!")
            }
        </script>
    </head>
    <body id="index" class="body">
        
        <div id="center_div">
            <h1>Welcome!</h1><br>
            
            <img src="me.jpg" alt="Timothy" id="selfie"/>
            
            <p>My name is Timothy Steele, and I am a computer science major at BYU-Idaho.  
                I enjoy problem-solving and learning new things.</p>
            
            <p>I also like to run, watch the old movies my friends didn't know existed, do family history, and spend time with family.</p>
            
            <p>I look forward to gaining more experience with web development on 
            the server side!</p>
            
            <h2>Please see what I'm learning at my
                <a href="list_assignments.html" 
                 onmouseover="myFunction()"> assignments page.</a></h2>
            
            <p>To test whether or not JavaScript is working today, <button onclick="testJavaScript()">Click Here</button></p>
        </div>
        
    </body>
</html>