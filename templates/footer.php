<div class="wrapper">
    <footer>
        <nav class="navbar-footer">
            <div class="container-footer">
                <p class="footer">ALL NEWS HERE</p>
                <div class="navbar-wrap-footer">
                    <ul class="navbar-menu-footer">
                        <div class="dropdown">
                            <button onclick="myFunction1()" class="dropbtn">Telephone</button>
                            <div id="myDropdown0" class="dropdown-content">
                                <li><a type="number">+380950123112</a></li>
                            </div>
                            <button onclick="myFunction2()" class="dropbtn">E-mail</button>
                            <div id="myDropdown1" class="dropdown-content">
                                <li><a type="mail">allnewshere@mail.com</a></li>
                            </div>
                            <button onclick="myFunction3()" class="dropbtn">Social Media</button>
                            <div id="myDropdown2" class="dropdown-content">
                                <li><a href="http://instagram.com">Inst: NewsHere</a></li>
                                <li><a href="http://facebook.com">Facebook: NewsHere</a></li>
                                <li><a href="http://youtube.com">Youtube: NewsHere</a></li>
                            </div>
                            <button onclick="myFunction4()" class="dropbtn">Address</button>
                            <div id="myDropdown3" class="dropdown-content">
                                <li><a>Lutsk</a></li>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
        </nav>
        <script>
            function myFunction1() {
                document.getElementById("myDropdown0").classList.toggle("show");
            }
            function myFunction2() {
                document.getElementById("myDropdown1").classList.toggle("show");
            }
            function myFunction3() {
                document.getElementById("myDropdown2").classList.toggle("show");
            }
            function myFunction4() {
                document.getElementById("myDropdown3").classList.toggle("show");
            }

            window.onclick = function(event) {
                if (!event.target.matches('.dropbtn')) {

                    var dropdowns = document.getElementsByClassName("dropdown-content");
                    var i;
                    for (i = 0; i < dropdowns.length; i++) {
                        var openDropdown = dropdowns[i];
                        if (openDropdown.classList.contains('show')) {
                            openDropdown.classList.remove('show');
                        }
                        if (openDropdown.classList.contains('show') === true) {
                            openDropdown.classList.remove('show');
                        }
                    }
                }
            }
        </script>
    </footer>
</div>
