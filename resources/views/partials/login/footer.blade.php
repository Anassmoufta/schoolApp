<div class="navbar navbar-expand-lg navbar-light">
    <div class="text-center d-lg-none w-100">
        <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
            <i class="icon-unfold mr-2"></i>
            Plus de Liens
        </button>
    </div>

    <div class="navbar-collapse collapse" id="navbar-footer">
        <span class="navbar-text">
            © {{ date('Y') }}. <a href="#">{{ Qs::getSystemName() }}</a> par <a href="#">CJ Inspired</a>
        </span>

        <ul class="navbar-nav ml-lg-auto">
            <li class="nav-item"><a href="{{ route('privacy_policy') }}" class="navbar-nav-link" target="_blank"><i class="icon-lifebuoy mr-2"></i> Politique de Confidentialité</a></li>
            <li class="nav-item"><a href="{{ route('terms_of_use') }}" class="navbar-nav-link" target="_blank"><i class="icon-file-text2 mr-2"></i> Conditions d'Utilisation</a></li>
            {{-- <li class="nav-item"><a href="#" class="navbar-nav-link font-weight-semibold"><span class="text-pink-400"><i class="icon-phone mr-2"></i> Contactez-nous</span></a></li> --}}
        </ul>
    </div>
</div>
