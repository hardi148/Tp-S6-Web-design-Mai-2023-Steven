<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />

      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="assets2/assets/css/bootstrap.css" />

  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="description" content="Découvrez les dernières avancées en matière d'IA grâce à nos articles approfondis.">
  <meta name="keywords" content="IA, intelligence artificielle, articles, avancées">

  <title>Articles sur l'IA - Découvrez les dernières avancées en intelligence artificielle</title>


  <!-- Custom styles for this template -->
  <link href="assets2/assets/css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="assets2/assets/css/responsive.css" rel="stylesheet" />
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('user.Header')
    <!-- end header section -->
  </div>
  <!-- Slideshow container -->
  <div class="slideshow-container">

    <!-- Full-width images with number and caption text -->
    <?php $i = 1; ?>
    @foreach ($recentAdminArticles as $article)
    <div class="container">
      <div class="mySlides fades">


        <div class="numbertext">{{$i}} / {{count($recentAdminArticles)}}</div>
        <img src="{{ $article->image}}" style="width:1100px;height:400px;" alt="{{ $article->titre }}">
        <div class="contenu">
          <h1> {{ $article->titre}} </h1>
          <h4>{{ $article->resumer}}</h4>
        </div>
      </div>
    </div>
    <?php $i++; ?>
    @endforeach

    <!-- Next and previous buttons -->
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
  </div>
  <br>

  <!-- The dots/circles -->
  <div style="text-align:center">
    @for ($i = 0; $i < count($recentAdminArticles); $i++) <span class="dot" onclick="currentSlide({{ $i + 1 }})"></span>
      @endfor
  </div>

  <hr>
  <!-- liste des article -->

  <div class="main">

    <h1>Liste des articles publié</h1>

    <div id="myBtnContainer">
      <button class="btn" onclick="filterSelection('all')"> Tout</button>
      <button class="btn" onclick="filterSelection('admin')">Par l'admin</button>
      <button class="btn" onclick="filterSelection('user')"> Par l'user</button>
    </div>

    <!-- Portfolio Gallery Grid -->
    <div class="row">
      <?php $k = 0; ?>
      @foreach ($listeAdminArticle as $article)
      <div class="column admin">
        <div class="content">
          <div class="image-frame">
            <img style="width:400px;height:200px"src="{{ $article->image }}" alt="{{ $article->titre }}">
          </div>
          <h4>{{ $article->titre }}</h4>
          <p>{{ $article->resumer }}</p>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$k}}">
            voir plus
          </button>
        </div>
      </div>

      <div class="modal fade" id="exampleModal{{$k}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel{{$k}}">{{ $article->titre }}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p> {{ $article->description }}</p>
            </div>
            <div class="modal-footer">
              <a href="{{url('/ArticleComplet')}}/{{$article->id}}-{{Str::slug($article->titre)}}-complet.html">voir l'article au complet</a>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">fermer</button>
            </div>
          </div>
        </div>
      </div>
      <?php $k++; ?>
      @endforeach


      @foreach ($listeUserArticle as $article)
      <div class="column user">
        <div class="content">
          <div class="image-frame">
            <img style="width: 400px;height: 200px" style="width: 100px;height: 100px" src="{{ $article->image }}" alt="{{ $article->titre }}">
          </div>
          <h4>{{ $article->titre }}</h4>
          <p>{{ $article->resumer }}</p>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$k}}">
            voir plus
          </button>
        </div>
      </div>

      <div class="modal fade" id="exampleModal{{$k}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel{{$k}}">{{ $article->titre }}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p> {{ $article->description }}</p>
            </div>
            <div class="modal-footer">
              <p>Auteur: {{$article->auteur}}
              <p>
              <a href="{{url('/ArticleComplet')}}/{{$article->id}}-{{Str::slug($article->titre)}}-complet.html">voir l'article au complet</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">fermer</button>
            </div>
          </div>
        </div>
      </div>
      <?php $k++; ?>
      @endforeach
      <!-- END GRID -->
    </div>

    <!-- END MAIN -->
  </div>
  <hr>
  <!-- recherche -->
  <div class="input-article">
    <form action="{{ url('/liste') }}" method="get">
      <h4>Rechercher un article:</h4>
      <input placeholder="rechercher" type="text" id="recherche" name="recherche"><br><br>
      <button class="btn btn-primary" type="submit">rechercher</button>
    </form>
    <!-- resultat recherche -->

    @if($recherche != null)
    <div class="row">
      @foreach ($recherche as $article)
      <div class="column user">
        <div class="content">
          <div class="image-frame">
            <img style="width: 400px;height: 200px" src="{{ $article->image }}" alt="{{ $article->titre }}">
          </div>
          <h4>{{ $article->titre }}</h4>
          <p>{{ $article->resumer }}</p>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$k}}">
            voir plus
          </button>
        </div>
      </div>

      <div class="modal fade" id="exampleModal{{$k}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel{{$k}}">{{ $article->titre }}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p> {{ $article->description }}</p>
            </div>
            <div class="modal-footer">
              @if($article->auteur!=null)
              <p>Auteur: {{$article->auteur}}</p>
              @endif
              <a href="{{url('/ArticleComplet')}}/{{$article->id}}-{{Str::slug($article->titre)}}-complet.html">voir l'article au complet</a>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">fermer</button>
            </div>
          </div>
        </div>
      </div>
      <?php $k++; ?>
      @endforeach
    </div>
    @endif
  </div>

  <hr>
  <div class="input-article">
    <h2>Ajouté un article</h2>
    <form action="{{ url('/addArticleUser') }}" method="post">

      {{ csrf_field() }}

      <label for="article_title">Titre de l'article:</label><br>
      <input placeholder="Titre" Style="width: 25%;" type="text" id="article_title" name="titre"><br><br>

      <label for="auteur">Auteur:</label><br>
      <input placeholder="Ex: Steven" type="text" id="auteur" name="auteur"><br><br>

      <label for="article_summary">Description:</label><br>
      <textarea style="width: 50%;height: 200px;" id="article_summary" name="description"></textarea><br><br>

      <p>image :
        <input style="width: 50%;" class="form-control" type="file" class="form-control" id="selectImage">
        <input type="hidden" name="image" id="imageCode">
      </p>

      <div><button class="btn btn-primary" type="submit">Ajouter Article</button></div>
    </form>
  </div>
  <script src="Utile/sliders.js">
    
  </script>
  <script src="Utile/utile.js"></script>
  <script src="Utile/uploadImg.js"></script>
  <script type="text/javascript" src="assets2/assets/js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="assets2/assets/js/bootstrap.js"></script>
</body>

</html>