@extends('layouts.app')

@section('content')
<header class="u-clearfix u-header u-header" id="sec-36f7">
      <a href="https://nicepage.com" class="u-image u-logo u-image-1">
          <img src="{{ url("images/logo.jpeg") }}" class="u-logo-image u-logo-image-1">
        </a>
        <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1">
          <div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0px;">
            <a class="u-button-style u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">
              <svg class="u-svg-link" viewBox="0 0 24 24"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use></svg>
              <svg class="u-svg-content" version="1.1" id="menu-hamburger" viewBox="0 0 16 16" x="0px" y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg"><g><rect y="1" width="16" height="2"></rect><rect y="7" width="16" height="2"></rect><rect y="13" width="16" height="2"></rect>
</g></svg>
            </a>
          </div>
          <div class="u-nav-container">
            <ul class="u-nav u-unstyled u-nav-1">
                <li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Home.html" style="padding: 10px 20px;">Home</a></li>
                <li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="About.html" style="padding: 10px 20px;">About</a></li>
                <li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Contact.html" style="padding: 10px 20px;">Contact</a></li>
            </ul>
          </div>
          <div class="u-nav-container-collapse">
            <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
              <div class="u-inner-container-layout u-sidenav-overflow">
                <div class="u-menu-close"></div>
                <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2">
                    <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Home.html">Home</a></li>
                    <li class="u-nav-item"><a class="u-button-style u-nav-link" href="About.html">About</a></li>
                    <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Contact.html">Contact</a></li>
                </ul>
              </div>
            </div>
            <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
          </div>
        </nav>
      </div></header>
    <section class="u-align-center u-clearfix u-image u-shading u-section-1" id="carousel_89fe" data-image-width="1620" data-image-height="1080">
      <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <h2 class="u-text u-text-body-alt-color u-text-default u-text-1">Our Pricing</h2>
        <div class="u-expanded-width u-list u-list-1">
          <div class="u-repeater u-repeater-1">
            <div class="u-container-style u-list-item u-repeater-item u-white u-list-item-1">
              <div class="u-container-layout u-similar-container u-container-layout-1">
                <h4 class="u-text u-text-default u-text-palette-3-base u-text-2">$34+</h4>
                <h4 class="u-text u-text-default u-text-3"> Regular Haircut</h4>
              </div>
            </div>
            <div class="u-container-style u-list-item u-repeater-item u-video-cover u-white">
              <div class="u-container-layout u-similar-container u-container-layout-2">
                <h4 class="u-text u-text-default u-text-palette-3-base u-text-4">$35+</h4>
                <h4 class="u-text u-text-default u-text-5"> Royal Shave</h4>
              </div>
            </div>
            <div class="u-container-style u-list-item u-repeater-item u-video-cover u-white">
              <div class="u-container-layout u-similar-container u-container-layout-3">
                <h4 class="u-text u-text-default u-text-palette-3-base u-text-6"> $60+&nbsp;<br>
                </h4>
                <h4 class="u-text u-text-default u-text-7"> Haircut + Royal Shave</h4>
              </div>
            </div>
            <div class="u-container-style u-list-item u-repeater-item u-video-cover u-white">
              <div class="u-container-layout u-similar-container u-container-layout-4">
                <h4 class="u-text u-text-default u-text-palette-3-base u-text-8">$65+</h4>
                <h4 class="u-text u-text-default u-text-9"> Haircut + Beard Trim</h4>
              </div>
            </div>
            <div class="u-container-style u-list-item u-repeater-item u-video-cover u-white">
              <div class="u-container-layout u-similar-container u-container-layout-5">
                <h4 class="u-text u-text-default u-text-palette-3-base u-text-10">$23+</h4>
                <h4 class="u-text u-text-default u-text-11"> Beard Trim Machine </h4>
              </div>
            </div>
            <div class="u-container-style u-list-item u-repeater-item u-video-cover u-white">
              <div class="u-container-layout u-similar-container u-container-layout-6">
                <h4 class="u-text u-text-default u-text-palette-3-base u-text-12">$55+</h4>
                <h4 class="u-text u-text-default u-text-13"> Beard + Facial</h4>
              </div>
            </div>
            <div class="u-container-style u-list-item u-repeater-item u-video-cover u-white">
              <div class="u-container-layout u-similar-container u-container-layout-7">
                <h4 class="u-text u-text-default u-text-palette-3-base u-text-14">$50+</h4>
                <h4 class="u-text u-text-default u-text-15"> Haircut and Facial</h4>
              </div>
            </div>
            <div class="u-container-style u-list-item u-repeater-item u-video-cover u-white">
              <div class="u-container-layout u-similar-container u-container-layout-8">
                <h4 class="u-text u-text-default u-text-palette-3-base u-text-16">$25+</h4>
                <h4 class="u-text u-text-default u-text-17"> Men’s Facial&nbsp;</h4>
              </div>
            </div>
          </div>
        </div>
        <p class="u-text u-text-default u-text-18" data-animation-name="customAnimationIn" data-animation-duration="1500" data-animation-delay="500">Image from <a href="https://www.freepik.com/photos/man" class="u-active-none u-border-1 u-border-active-palette-1-light-2 u-border-hover-palette-1-light-2 u-border-white u-btn u-button-style u-hover-none u-none u-text-body-alt-color u-btn-1" target="_blank">Freepik</a>
        </p>
      </div>
    </section>


    <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-c5a0"><div class="u-clearfix u-sheet u-sheet-1">
        <p class="u-small-text u-text u-text-variant u-text-1">Sample text. Click to select the Text Element.</p>
      </div></footer>
    <section class="u-backlink u-clearfix u-grey-80">
      <a class="u-link" href="https://nicepage.com/website-templates" target="_blank">
        <span>Website Templates</span>
      </a>
      <p class="u-text">
        <span>created with</span>
      </p>
      <a class="u-link" href="" target="_blank">
        <span>Website Builder Software</span>
      </a>.
    </section>


@endsection
