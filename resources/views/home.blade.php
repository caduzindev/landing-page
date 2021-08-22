<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>TECNO</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <link rel="stylesheet" href="css/home.css">
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top"><img src="assets/img/tecno.png" alt="..." /></a>
                <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#services">Serviços</a></li>
                        @if(count($depositions)>=1)
                            <li class="nav-item"><a class="nav-link" href="#deposition">Depoimentos</a></li>
                        @endif
                        <li class="nav-item"><a class="nav-link" href="#about">Sobre</a></li>
                        <li class="nav-item"><a class="nav-link" href="#team">Time</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Contato</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Head-->
        @if(count($caroulsels)>=1)
            <div id="carouselExampleSlidesOnly" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach($caroulsels as $caroulsel)
                        <div class="carousel-item {{$caroulsel->status}}" data-bs-interval="2000">
                            <img src="{{$caroulsel->photo_url}}" class="w-100 img-fluid" style="height:100vh">
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        @else
            <header class="head"></header>
        @endif
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Serviços</h2>
                    <h3 class="section-subheading text-muted">Veja nossos serviços</h3>
                </div>
                <div class="row text-center">
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x bg-service"></i>
                            <i class="fas fa-mobile-alt fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Desenvolvimento de Apps</h4>
                        <p class="text-muted">Desenvolvemos pra android e ios, com a interface e funcionalidades infinitas.</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x bg-service"></i>
                            <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Sistemas Web</h4>
                        <p class="text-muted">Desenvolvemos sitemas web como ERPs,Dashboards,Redes Sociais e etc.</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x bg-service"></i>
                            <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">E-commerces</h4>
                        <p class="text-muted">Desenvolvemos qualquer tipo de e-commerce, de lojas comuns á marketplaces.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- deposition with conditional-->
        @if(count($depositions)>=1)
        <section class="page-section bg-light" id="deposition">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Depoimentos</h2>
                    <h3 class="section-subheading text-muted">Veja o que falam de nós</h3>
                </div>
                <div class="row">
                    @foreach($depositions as $deposition)
                        <div class="col-lg-4 col-sm-6 mb-4">
                            <div class="deposition-item">
                                <a class="deposition-link" data-bs-toggle="modal" href="#depositionModal{{$deposition->id}}">
                                    <div class="deposition-hover">
                                        <div class="deposition-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                    </div>
                                    <img class="w-100" src="{{$deposition->photo_url}}" style="height:350px"/>
                                </a>
                                <div class="deposition-caption">
                                    <div class="deposition-caption-heading">{{$deposition->name}}</div>
                                    <div class="deposition-caption-subheading text-muted">Depoimento</div>
                                </div>
                            </div>
                        </div>
                        <div class="deposition-modal modal fade" id="depositionModal{{$deposition->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="close-modal" data-bs-dismiss="modal">
                                        <img src="assets/img/close-icon.svg" alt="Close modal" />
                                    </div>
                                    <div class="container">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-8">
                                                <div class="modal-body">
                                                    <!-- Deposition details-->
                                                    <h2 class="text-uppercase">{{$deposition->name}}</h2>
                                                    <img class="img-fluid d-block mx-auto" src="{{$deposition->photo_url}}" style="height:500px" />
                                                    <p>{{$deposition->description}}</p>
                                                    <button class="btn btn-danger btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                                        <i class="fas fa-times me-1"></i>
                                                        Fechar Depoimento
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif
        <!-- About-->
        <section class="page-section" id="about">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Sobre a <strong>TECNO</strong></h2>
                    <h3 class="section-subheading text-muted">Saiba mais sobre nos.</h3>
                </div>
                <ul class="timeline">
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/1.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>2012-2014</h4>
                                <h4 class="subheading">O inicio</h4>
                            </div>
                            <div class="timeline-body">
                                <p class="text-muted">
                                    Nesta epoca que a empresa foi aberta, no inicio so era desenvolvido websites com Wordpress com alguns serviços de design complementares.
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/2.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>2015-2018</h4>
                                <h4 class="subheading">Crescimento</h4>
                            </div>
                            <div class="timeline-body">
                                <p class="text-muted">
                                    Aqui foi quando a empresa cresceu bastante e conseguimos atender clientes maiores
                                </p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/3.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>2019-2021</h4>
                                <h4 class="subheading">Meta de Hoje</h4>
                            </div>
                            <div class="timeline-body">
                                <p class="text-muted">
                                    Nossa meta e gerar valor para a sociedade,empresas e para os nossos colaboradores. Sabemos que nossos serviços podem mudar o mundo
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image">
                            <h4>
                                Fim
                                <br />
                                Por enquanto
                                <br>
                                :)
                            </h4>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
        <!-- Team-->
        <section class="page-section bg-light" id="team">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Nosso incrivel time!!</h2>
                    <h3 class="section-subheading text-muted">Veja a formação do nosso time</h3>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-4"> 
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets/img/team/2.jpg" alt="..." />
                            <h4>Rafaela Santos</h4>
                            <p class="text-muted">Software engineering at <strong>TECNO</strong></p>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets/img/team/1.jpeg" alt="..." />
                            <h4>Carlos Eduardo</h4>
                            <p class="text-muted">CEO and CTO at <strong>TECNO</strong></p>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets/img/team/3.jpg" alt="..." />
                            <h4>Pablo Jonas</h4>
                            <p class="text-muted">Designer at <strong>TECNO</strong></p>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center"><p class="large text-muted">E impossivel não ter um produto de qualidade com uma equipe incrivel como está</p></div>
                </div>
            </div>
        </section>
        <!-- Clients-->
        <div class="py-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/microsoft.svg" alt="..." /></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/google.svg" alt="..." /></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/facebook.svg" alt="..." /></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/ibm.svg" alt="..." /></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Contato</h2>
                    <h3 class="section-subheading text-muted">Será bom te conhecer</h3>
                </div>
                <form id="contactForm" method="POST">
                    <div class="row mb-5">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input class="form-control" name="name" id="name" type="text" placeholder="Seu Name *" required/>
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="email" id="email" type="email" placeholder="Seu Email *" required/>
                            </div>
                        </div>
                    </div>
                    <div class="text-center"><button class="btn btn-xl text-uppercase text-white" type="submit" style="background-color:#2f0743">Enviar</button></div>
                </form>
            </div>
            <!-- Toasts -->
            <div class="toast-container">
                <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                    <div id="ToastSuccess" class="toast bg-success" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header bg-success">
                            <strong class="me-auto text-white">Sucesso!!</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body text-white">
                            Te enviamos um e-mail... confere lá
                        </div>
                    </div>
                </div>
                <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                    <div id="ToastError" class="toast bg-danger" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header bg-danger">
                            <strong class="me-auto text-white">Erro!!</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body text-white">
                            Ocorrou um erro... por favor tente mais tarde
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-start">Copyright &copy; projeto landingpage 2021</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                        <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/app.js"></script>
    </body>
</html>
