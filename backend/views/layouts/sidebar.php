
    <div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true" data-img="{{ asset('dashboard/images/backgrounds/02.jpg') }}">
        <div class="navbar-header">
          <ul class="nav navbar-nav flex-row">       
            <li class="nav-item mr-auto"><a class="navbar-brand" href="index.html">
                <img class="brand-logo" alt="Chameleon admin logo" src="/images/logo/logo.png"/>
                <h3 class="brand-text">Chameleon</h3></a></li>
            <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
          </ul>
        </div>
        <div class="main-menu-content">
          <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="active"><a href="<?php

use yii\helpers\Url;

echo Url::to('/product') ?>"><i class="ft-home"></i><span class="menu-title" data-i18n="">Products</span></a>
            </li>
            <li><a href="<?php


echo Url::to('/category') ?>"><i class="ft-home"></i><span class="menu-title" data-i18n="">Categories</span></a>
            </li>
          </ul>
        </div>
        <div class="navigation-background"></div>
      </div>