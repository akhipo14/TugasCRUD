<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
      <a class="navbar-brand" href="#">Tugas CRUD | Rafli haikal</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link {{Request::is('/') ? 'active' : ''}}" aria-current="page" href="/">home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{Request::is('produk*') ? 'active' : ''}}" aria-current="page" href="/produk">Produk</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{Request::is('kategori*') ? 'active' : ''}}" aria-current="page" href="/kategori">Kategori</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{Request::is('keranjang*') ? 'active' : ''}}" aria-current="page" href="/keranjang">Keranjang</a>
          </li>
      </ul>
    </div>
  </nav>