<footer class="">
    <div class="header__footer  md:p-2 lg:p-8 ">
        <div class="child child__footer-1 flex justify-center items-center ">
            <a href="#" class="flex items-center">
                <div><h2 class="text-lg sm:text-xl md:text-3xl lg:text-4xl text-while">MUGIWARA</h2></div>
            </a>
        </div>
        <div class="child child__footer-2 flex-col flex justify-center items-center">
            <ul class="flex flex-col gap-3">
                <li class='flex gap-3'>
                    <span><i class='bx bxs-map'></i></span>
                    <span>{{$setting->address}} </span>
                </li>
                <li class='flex gap-3'>
                    <span><i class='bx bxs-phone-call' ></i></span>
                    <span>{{$setting->phone}} </span>
                </li>
                <li class='flex gap-3'>
                    <span><i class='bx bx-envelope' ></i></span>
                    <span>{{$setting->email}}</span>
                </li>
                <li class='flex gap-3'>
                    <span><i class='bx bxs-map'></i></span>
                    <span>{{$setting->address}}</span>
                </li>
            </ul>
            <form class="md:w-[90%] mx-auto bg-while rounded-2xl overflow-hidden">
                <div class="w-[100%]  bg-color-rating relative">
                    <i class='bx bx-envelope absolute left-2 top-[25%] text-2xl z-40 text-color-gray-dark'></i>
                    <input class="w-[100%] h-[100%] p-4 px-9 border-0 outline-none text-color-gray-dark" type="email" placeholder="Your Email" name="message"/>
                    <button class="absolute border-none outline-none right-0 z-40 text-color-gray-dark bg-color-red-button h-[100%] w-20">
                        <i class='bx bx-send send text-3xl'></i>
                    </button>
                </div>
            </form>
        </div>
        <div class="child child__footer-3 ">
            <a href="#" class="flex border mx-2 items-center w-[45%] rounded-md p-1 px-3">
                <div class="mx-1"><i class='bx bxl-apple text-3xl' ></i></div>
                <div>
                    <span class="text-xs m-0">Download on the</span>
                    <h3 class="m-0 mt-[-8px] text-while">App Store</h3>
                </div>
            </a>
            <a href="#" class="flex border items-center w-[45%] rounded-md  p-1 px-3">
                <div class="mx-1 m-0"><i class='bx text-3xl bxl-play-store' ></i></div>
                <div>
                    <span class="text-xs">Git in on</span>
                    <h3 class="m-0 mt-[-8px] text-while">Google Play</h3>
                </div>
            </a>
        </div>
    </div>
    <div class="body__footer  bg-color-gray-dark">
        <div class="our__services p-5 md:p-8 lg:p-8 ">
            <ul>
                <h2 class="text-while text-xl">SERVICE CLIENT</h2>
                <li><a href="#">Contactez-nous</a></li>
                <li><a href="#">Aide & FAQ</a></li>
                <li><a href="#">Commandez par Tél: 05.22.04.18.18</a></li>
                <li><a href="#">Utiliser un coupon de réduction</a></li>
                <li><a href="#">Politique de Résolution des Litiges</a></li>
                <li><a href="#">Retour et Remboursement</a></li>
            </ul>
            <ul>
                <h2 class="text-while text-xl">À PROPOS</h2>
                <li><a href="#">Qui sommes-nous</a></li>
                <li><a href="#">Carrières chez Jumia</a></li>
                <li><a href="#">Conditions Générales d'Utilisation</a></li>
                <li><a href="#">Notification sur la confidentialité</a></li>
                <li><a href="#">Notification sur les cookies</a></li>
                <li><a href="#">Termes et Conditions de Retour et Remboursement</a></li>
                <li><a href="#">Jumia Express</a></li>
                <li><a href="#">Toutes les boutiques officielles</a></li>
                <li><a href="#">Ventes Flash</a></li>
            </ul>
            <ul>
                <h2 class="text-while text-xl">GAGNEZ DE L'ARGENT AVEC JUMIA</h2>
                <li><a href="#">Vendez sur Jumia</a></li>
                <li><a href="#">Devenez Consultant Jumia</a></li>
                <li><a href="#">Devenir partenaire de service logistique</a></li>
                <li><a href="#">Devenir livreur Jumia.ma</a></li>
                <li><a href="#">Devenir livreur Jumia Food</a></li>
            </ul>
            <ul>
                <h1 class="text-while text-xl">JUMIA À L'INTERNATIONAL</h1>
                <li><a href="#">Egypte</a></li>
                <li><a href="#">Ghana</a></li>
                <li><a href="#">Kenya</a></li>
                <li><a href="#">Nigeria</a></li>
                <li><a href="#">Sénégal</a></li>
                <li><a href="#">Tunisie</a></li>
                <li><a href="#">Uganda</a></li>
            </ul>
        </div>
    </div>
   </footer>