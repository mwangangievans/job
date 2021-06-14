@extends('layouts.app')
@section('content')
<div class="hero1">
      <div class="container1">
            <div class="animal">
              <a href="#!"><img src="{{url('/image/juda.jpeg')}}" alt="lion" class="image"></a>
              <a href=""><img src="{{url('/image/dovu.jpeg')}}" alt="buffalo" class="image"></a>
            <a href=""><img src="{{url('/image/rhino1.jpeg')}}" 
            alt="rhino" class="image" height="650px" width="940px" ></a>

           
             <a href=""><img src="{{url('/image/mboo.jpeg')}}" alt="lion"  class="image"></a>
              <a href="">  <img src="{{url('/image/kikoyo.jpeg')}}" alt="leopard" class="image" ></a>
             </div>
         <div class="five"> <h1>Welcome  To <span class="life">Big-Life-Zoo</span> The Home of the   big <span class="life">5</span></h1>
       
      </div>
       </div>
</div> 
<h1 class="category">list of animals available in our zoo</h1>
<div class="jossy1"> <button class="jossy2"><a href="#!">
          <img src="{{url('/image/3.jpeg')}}"  alt="Image" class="jossy"/>
        </a><h1 class="lion">lions</h1></button>
        <button class="jossy2"><a href="#!">
          <img src="{{url('/image/4.jpeg')}}"  alt="Image" class="jossy"/>
        </a><h1 class="lion">Leopards</h1></button>
        <button class="jossy2"><a href="#!">
          <img src="{{url('/image/hyena.jpeg')}}"  alt="Image" class="jossy"/>
        </a><h1 class="lion">hyenas</h1></button>
        <button class="jossy2"><a href="#!">
          <img src="{{url('/image/monkey.jpeg')}}"  alt="Image" class="jossy"/>
        </a><h1 class="lion">Monkeys</h1></button>
        <button class="jossy2"><a href="#about">
          <img src="{{url('/image/mboo.jpeg')}}"  alt="Image" class="jossy"/>
        </a><h1 class="lion">buffalos</h1></button>
        <button class="jossy2"><a href="#!">
          <img src="{{url('/image/giraffe.jpeg')}}"  alt="Image" class="jossy"/>
        </a><h1 class="lion">Giraffes</h1></button>
         <button class="jossy2"><a href="#!">
          <img src="{{url('/image/rhino.jpg')}}"  alt="Image" class="jossy"/>
        </a><h1 class="lion">Rhinos</h1></button> 
 <button class="jossy2"><a href="#!">
          <img src="{{url('/image/bird.jpeg')}}"  alt="Image" class="jossy"/>
        </a><h1 class="lion">Birds</h1></button> 
          <button class="jossy2"><a href="#!">
          <img src="{{url('/image/crocodile.jpeg')}}"  alt="Image" class="jossy"/>
        </a><h1 class="lion">crocodile</h1></button> 
         
</div>
 <!-- <main id="tv"></main> -->

<div class="mission">
 <section class="container content">
     <h1 id="mission">OUR MISSION 
</h1>
      <h2>WILDLIFE PROTECTION
</h2>
      <p id="passage">Big Life strives to prevent the poaching of all wildlife within our area of operation.

We track and apprehend poachers and collaborate with local prosecutors to ensure that they are punished to the fullest extent of the law. One of the largest employers of local Maasai in the ecosystem, Big Life’s community rangers are expertly trained and well-equipped to tackle a variety of wildlife crimes.

Since our inception, poaching of all animals has dramatically declined in our area of operation.</p>

      <h2>We have four main categories of wildlife protection initiatives:

</h2>
      <p>
      <!-- <main id="work"> -->
    <div class="projects">
      <div class="item">
        <a href="#!">
          <img src="{{url('/image/poaching.jpg')}}"  alt="Image"/>
        </a>
        <a href="#" class="btn-light">
<h4>Big Life strives to prevent the poaching of all wildlife – including thousands of migrating elephants, a growing lion population, and critically endangered Eastern black rhinos – within our area of operation and wildlife trafficking where tackle a variety of wildlife.</h4>        </a>
        <a href="#" class="btn-dark">
           ANTI-POACHING
        </a>
      </div>
      <div class="item">
        <a href="#!">
          <img src="{{url('/image/horn.jpg')}}"  alt="Image"/>
        </a>
        <a href="#" class="btn-light">
<h4>Big Life employs Maasai rangers from local communities who work collaboratively with a vast informer network. Our rangers are expertly trained and well-equipped to tackle a variety of wildlife crimes, including combating wildlife trafficking. We track and apprehend.</h4>        </a>
        <a href="#" class="btn-dark">
           ANTI-TRAFFICKING
        </a>
      </div>
      <div class="item">
        <a href="#!">
          <img src="{{url('/image/rhino.jpg')}}"  alt="Image"/>
        </a>
        <a href="#" class="btn-light">
<h4>There are eight known critically-endangered Eastern black rhinoceros in Big Life’s area of operation. They spend most of their time in the densely-forested Chyulu Hills National Park, protected by dedicated Big Life rangers and the Kenya Wildlife Service.</h4></a>
        <a href="#" class="btn-dark">
          RHINO PROTECTION
        </a>
      </div>
       <div class="item">
        <a href="#!">
          <img src="{{url('/image/car.jpg')}}"  alt="Image"/>
        </a>
        <a href="#" class="btn-light">
<h4>In the fight against wildlife poaching, there is no weapon as effective as a human being. And Big Life’s female rangers are proving that they can do the job just as well as their male counterparts, as one bushmeat poacher recently discovered the hard way</h4></a>
        <a href="#" class="btn-dark">
Big Life’s female rangers        </a>
      </div>
    </div>

      </p>
    </section>
    <hr>
</div>
 <main id="about">
    <h1 class="lg-heading">
      About us
      <span class="text-secondary"> The Big Life Zoo Foundation</span>
    </h1>
    
    <div class="about-info">
       <img src="{{url('/image/ndovu.jpg')}}"  width="100%"  height="100%" alt="Image"/>

      <!-- <img src="img/portrait.jpg" alt="John Doe" class="bio-image"> -->

      <div class="bio">
        <h3 class="text-secondary">OUR HISTORY</h3>
        <p>Big Life was co-founded in September 2010 by photographer <b>Nick Brandt</b>, award-winning conservationist Richard Bonham,
 and entrepreneur Tom Hill.
          <hr>

Since its inception, Big Life has expanded to employ hundreds of local Maasai rangers—with more than 40 permanent outposts and tent-based field units, 14 vehicles, tracker dogs, and aerial surveillance—protecting 1.6 million acres of wilderness in the Amboseli-Tsavo-Kilimanjaro ecosystem of East Africa.</p>
      </div>
    </div>
  </main>
  <h2 class="sm-heading">
    <main id="contact">
    <h1 class="lg-heading">
      Contact
      <span class="text-secondary">US</span>
    </h1>
   
    <div class="boxes">
      <div>
        <span class="text-secondary">Email: </span>  munyei35792@gmail.com
      </div>
       <h2 class="sm-heading">OR</h2>
      <div>
         <div>
        <span class="text-secondary">Email: </span> biglifezoofoundation@gmail.com
      </div>
      <div>
        <span class="text-secondary">Phone: </span> (+254) 718 836 502
      </div>
      <div>
        <span class="text-secondary">Address: </span> 123 Main Street, Nairobi, kenya 10030
      </div>
    </div>
    <footer id="main-footer">
    Copyright &copy; 2021 <span class="text-secondary"><i>@BIG-LIFE-ZOO-FOUNDATION</i></span>

  </footer>
  </main></h2>
   
  
    @endsection
