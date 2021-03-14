<head>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
    <script>
        var cont=0;
    function loopSlider(){
      var xx= setInterval(function(){
            switch(cont)
            {
            case 0:{
                $("#slider-1").fadeOut(400);
                $("#slider-2").delay(400).fadeIn(400);
                $("#sButton1").removeClass("bg-purple-800");
                $("#sButton2").addClass("bg-purple-800");
            cont=1;

            break;
            }
            case 1:
            {

                $("#slider-2").fadeOut(400);
                $("#slider-1").delay(400).fadeIn(400);
                $("#sButton2").removeClass("bg-purple-800");
                $("#sButton1").addClass("bg-purple-800");

            cont=0;

            break;
            }


            }},9500);

    }

    


    function sliderButton1(){

        $("#slider-2").fadeOut(400);
        $("#slider-1").delay(400).fadeIn(400);
        $("#sButton2").removeClass("bg-purple-800");
        $("#sButton1").addClass("bg-purple-800");
        reinitLoop(4000);
        cont=0

        }

        function sliderButton2(){
        $("#slider-1").fadeOut(400);
        $("#slider-2").delay(400).fadeIn(400);
        $("#sButton1").removeClass("bg-purple-800");
        $("#sButton2").addClass("bg-purple-800");
        reinitLoop(4000);
        cont=1

        }

        $(window).ready(function(){
            $("#slider-2").hide();
            $("#sButton1").addClass("bg-purple-800");
            loopSlider();
         });


    </script>
</head>

<body>
    <div class="sliderAx h-auto">
        <div id="slider-1" class="container-fluid mx-auto">
            <div class="bg-cover bg-fixed bg-center h-screen text-white py-52 px-10  object-fill" style="background-image: url(img/licor/pug_1.jpg)">
                <div class="md:w-1/2">
                    <p class="font-bold text-sm uppercase">Pet Shop </p>
                    <p class="text-3xl font-bold">Mejores Productos para tu mascota.</p>
                    <p class="text-2xl mb-10 leading-none"></p>
                    <a href="#"
                        class="bg-purple-800 py-4 px-8 text-white font-bold uppercase text-xs rounded hover:bg-gray-200 hover:text-gray-800">Ingresar</a>
                </div>
            </div> <!-- container -->

        </div>

        <div id="slider-2" class="container-fluid mx-auto">
            <div class="bg-cover bg-fixed bg-center  h-screen text-white py-52 px-10  object-fill"
                style="background-image: url(img/licor/pug_2.jpg)">
                <div class="md:w-1/2">
                    <p class="font-bold text-sm uppercase">Productos</p>
                    <p class="text-3xl font-bold">De Calidad a disposición del público. </p>
                    <p class="text-2xl mb-10 leading-none"></p>
                    <a href="#"
                        class="bg-purple-800 py-4 px-8 text-white font-bold uppercase text-xs rounded hover:bg-gray-200 hover:text-gray-800">Productos</a>
                </div>

            </div> <!-- container -->

        </div>
    </div>
    <div class="flex justify-between w-12 mx-auto pb-2">
        <button id="sButton1" onclick="sliderButton1()" class="bg-purple-400 rounded-full w-4 pb-2 "></button>
        <button id="sButton2" onclick="sliderButton2() " class="bg-purple-400 rounded-full w-4 p-2"></button>
    </div>

</body>
