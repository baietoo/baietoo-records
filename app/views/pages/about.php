<?php require APP_ROOT . '/views/inc/header.php'; ?>
<h1><?php echo $data['title']; ?></h1>
<p><?php echo $data['description']; ?></p>


    <h3>Hai pe la noi</h3>
    <!--The div element for the map -->
    <div id="map"></div>
<!-- AIzaSyAju8im3UgUSE4ct7yMrQF-7CHcb8EQ0nc -->
    <!-- prettier-ignore -->
    <script>(g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})
        ({key: "AIzaSyAju8im3UgUSE4ct7yMrQF-7CHcb8EQ0nc", v: "beta"});</script>

<!-- ADRESA -->
<div class="container">
<div class="row">
<div class="col-md-4">
<address>
  <strong>Baietoo Records</strong><br>
  56 Strada Nicolae Balcescu<br>
  Turnu Magurele, Romania<br>
  <abbr title="Phone">Telefon:</abbr> 0755 456 890
</address>

</div>
<?php require APP_ROOT . '/views/inc/footer.php'; ?>
