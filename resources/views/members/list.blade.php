@extends('layouts.main')
@section('title', 'Reset Password')
@section('menu','member.list')
@section('content')
<div class="rui-page-title">
    <div class="container-fluid">
        <!-- START: Breadcrumbs -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#"> </a>
                </li>
            </ol>
        </nav>
        <!-- END: Breadcrumbs -->

        <h1 class="member-heading">
            Members |<span class="total-member">50 Total</span>
        </h1>
        <span
            ><input
                type="text"
                placeholder="Search"
                class="form-control set-search-input"/><span
                class="fa fa-search form-control-feedback set-icon-input"
            ></span
        ></span>
        <div>
            <button class="btn btn-primary btn-property">Add Member</button>
        </div>
    </div>
</div>

<div class="rui-page-content">
    <div class="container-fluid">
        <!--
        START: Swiper

        Additional attributes:
            data-swiper-loop
            data-swiper-grabCursor
            data-swiper-autoHeight
            data-swiper-center
            data-swiper-slides ('auto' or Number)
            data-swiper-gap
            data-swiper-speed
            data-swiper-breakpoints (Example: '992:3,768:2')
    -->
        <div class="media-color">
            <div class="media media-success">
                <div class="media-img circle-image">S</div>
                <div class="media-body">
                    <div class="media-title set-title">Fawaz Ali</div>
                    <small class="media-subtitle email-text"
                        ><span class="fas fa-envelope set-mail"></span>
                        fawaz@bitspro.com
                        <span class="fas fa-map-marker-alt set-mails"></span
                        ><span>Geogrageown, TX</span></small
                    >
                </div>
                <div class="rank">
                    <div class="certificate-area">
                        <div class="icon-div">
                            <span
                                class="fas fa-certificate set-certificate"
                            ></span>
                        </div>
                        <div class="set-rank">Rank</div>
                        <div class="adv-blue">Adv Blue</div>
                    </div>
                    <div class="certificate-area">
                        <div class="icon-div">
                            <span class="fas fa-trophy set-certificate"></span>
                        </div>
                        <div class="set-rank">Awards</div>
                        <div class="adv-num">2</div>
                    </div>
                    <div class="certificate-area">
                        <div class="icon-div">
                            <span
                                class="fas fa-shield-alt set-certificate"
                            ></span>
                        </div>
                        <div class="set-rank">Awards</div>
                        <div class="adv-num">5</div>
                    </div>
                </div>
                <div>
                    <span class="btn btn-custom-round">
                        <span
                            data-feather="more-vertical"
                            class="rui-icon rui-icon-stroke-1_5"
                        ></span>
                    </span>
                </div>
            </div>
        </div>
        <div class="media-color">
            <div class="media media-success">
                <div class="media-img circle-image">S</div>
                <div class="media-body">
                    <div class="media-title set-title">Fawaz Ali</div>
                    <small class="media-subtitle email-text"
                        ><span class="fas fa-envelope set-mail"></span>
                        fawaz@bitspro.com
                        <span class="fas fa-map-marker-alt set-mails"></span
                        ><span>Geogrageown, TX</span></small
                    >
                </div>
                <div class="rank">
                    <div class="certificate-area">
                        <div class="icon-div">
                            <span
                                class="fas fa-certificate set-certificate"
                            ></span>
                        </div>
                        <div class="set-rank">Rank</div>
                        <div class="adv-blue">Adv Blue</div>
                    </div>
                    <div class="certificate-area">
                        <div class="icon-div">
                            <span class="fas fa-trophy set-certificate"></span>
                        </div>
                        <div class="set-rank">Awards</div>
                        <div class="adv-num">2</div>
                    </div>
                    <div class="certificate-area">
                        <div class="icon-div">
                            <span
                                class="fas fa-shield-alt set-certificate"
                            ></span>
                        </div>
                        <div class="set-rank">Awards</div>
                        <div class="adv-num">5</div>
                    </div>
                </div>
                <span class="btn btn-custom-round">
                    <span
                        data-feather="more-vertical"
                        class="rui-icon rui-icon-stroke-1_5"
                    ></span>
                </span>
            </div>
        </div>
        <div class="media-color">
            <div class="media media-success">
                <div class="media-img circle-image">S</div>
                <div class="media-body">
                    <div class="media-title set-title">Fawaz Ali</div>
                    <small class="media-subtitle email-text"
                        ><span class="fas fa-envelope set-mail"></span>
                        fawaz@bitspro.com
                        <span class="fas fa-map-marker-alt set-mails"></span
                        ><span>Geogrageown, TX</span></small
                    >
                </div>
                <div class="rank">
                    <div class="certificate-area">
                        <div class="icon-div">
                            <span
                                class="fas fa-certificate set-certificate"
                            ></span>
                        </div>
                        <div class="set-rank">Rank</div>
                        <div class="adv-blue">Adv Blue</div>
                    </div>
                    <div class="certificate-area">
                        <div class="icon-div">
                            <span class="fas fa-trophy set-certificate"></span>
                        </div>
                        <div class="set-rank">Awards</div>
                        <div class="adv-num">2</div>
                    </div>
                    <div class="certificate-area">
                        <div class="icon-div">
                            <span
                                class="fas fa-shield-alt set-certificate"
                            ></span>
                        </div>
                        <div class="set-rank">Awards</div>
                        <div class="adv-num">5</div>
                    </div>
                </div>
                <span class="btn btn-custom-round">
                    <span
                        data-feather="more-vertical"
                        class="rui-icon rui-icon-stroke-1_5"
                    ></span>
                </span>
            </div>
        </div>
        <div class="media-color">
            <div class="media media-success">
                <div class="media-img circle-image">S</div>
                <div class="media-body">
                    <div class="media-title set-title">Fawaz Ali</div>
                    <small class="media-subtitle email-text"
                        ><span class="fas fa-envelope set-mail"></span>
                        fawaz@bitspro.com
                        <span class="fas fa-map-marker-alt set-mails"></span
                        ><span>Geogrageown, TX</span></small
                    >
                </div>
                <div class="rank">
                    <div class="certificate-area">
                        <div class="icon-div">
                            <span
                                class="fas fa-certificate set-certificate"
                            ></span>
                        </div>
                        <div class="set-rank">Rank</div>
                        <div class="adv-blue">Adv Blue</div>
                    </div>
                    <div class="certificate-area">
                        <div class="icon-div">
                            <span class="fas fa-trophy set-certificate"></span>
                        </div>
                        <div class="set-rank">Awards</div>
                        <div class="adv-num">2</div>
                    </div>
                    <div class="certificate-area">
                        <div class="icon-div">
                            <span
                                class="fas fa-shield-alt set-certificate"
                            ></span>
                        </div>
                        <div class="set-rank">Awards</div>
                        <div class="adv-num">5</div>
                    </div>
                </div>
                <span class="btn btn-custom-round">
                    <span
                        data-feather="more-vertical"
                        class="rui-icon rui-icon-stroke-1_5"
                    ></span>
                </span>
            </div>
        </div>
        <div class="set-pagintion">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item pagination-btn">
                        <a class="page-link" href="#"
                            ><span
                                data-feather="chevron-left"
                                class="rui-icon rui-icon-stroke-1_5"
                            ></span
                        ></a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">1</a>
                    </li>
                    <li class="page-item active">
                        <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">3</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">4</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">5</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">6</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">7</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">8</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">9</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">10</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#"
                            ><span
                                data-feather="chevron-right"
                                class="rui-icon rui-icon-stroke-1_5"
                            ></span
                        ></a>
                    </li>
                    <li>
                        <input
                            type="number"
                            value="10"
                            class="form-control pegition-control"
                        />
                    </li>
                    <li class="record">Display 10 of 230 records</li>
                </ul>
            </nav>
        </div>
        @endsection
    </div>
</div>
