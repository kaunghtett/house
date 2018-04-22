<!-- Navbar-->
<nav class="navbar navbar-expand-lg">
    <div class="container"><a href="index.html" class="navbar-brand"><img src="{{ asset('img/logo-light.svg') }}" alt="..." width="180" class="img-fluid"></a>
        <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><span></span><span></span><span></span></button>
        <div id="navbarSupportedContent" class="collapse navbar-collapse">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item active">
                    <a href="{{ url('/') }}" class="nav-link">
                        Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="about.html" class="nav-link">About</a>
                </li>
                <li class="nav-item">
                    <a href="property-grid" class="nav-link">Property</a>
                </li>
                <li class="nav-item">
                    <a href="agents.html" class="nav-link">Agents</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/gallery') }}" class="nav-link">Gallery</a>
                </li>
            </ul>
            <ul class="secondary-nav-menu list-inline ml-auto mb-0">
                <li class="list-inline-item"><a href="{{ url('/houses/create') }}" class="btn btn-primary btn-gradient">Submit property</a></li>
            </ul>
        </div>
    </div>
</nav>
