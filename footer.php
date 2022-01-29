                    
                    
                </div>            
        </div>
    </main>

    <!--Main Section End-->
    

    <!--JS File-->
    <script src="./vendors/js/materialize.min.js"></script>
    <script src="./assets/js/main.js"></script>

    <script>
        const toggleBtn=document.getElementById("toggleBtn");
        const sidebar=document.querySelector(".sidebar")

        toggleBtn.onclick=()=>{
            sidebar.classList.toggle("active")
        }
    </script>

<?php 


    ob_end_flush();


?>
</body>
</html>