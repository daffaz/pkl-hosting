@extends('layouts.master')
@section('title', 'Buku ' . $ebook->judul)
@section('content')

<div class="container mt-5 mb-5 ">
    <div class="row mx-auto ml-lg-4 mr-lg-n5">
        <div class="modal fade " id="bacaEbook" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog show-modal-dialog mr-auto"  role="document">

                <div class="modal-content show-modal-content">

                    <div class="modal-header bg-dark text-white fixed-top" style="z-index: 99; border-top:none;">
                        {{-- <div id="app"></div> --}}

                        <span class="read-more text-show-judul" style="width: 10%;">{{$ebook->judul}}</span>
                        <button class="ml-3 bg-transparent text-white" id="zoomoutbutton"  type="button" data-toggle="tooltip" data-placement="bottom" title="Zoom Out"><i class="fas fa-minus-circle"></i></button>
                        <button class="ml-3 bg-transparent text-white" id="zoominbutton" type="button" data-toggle="tooltip" data-placement="bottom" title="Zoom In"><i class="fas fa-plus-circle"></i></button>
                        <span class="text-page"><button class="bg-transparent border-0" id="prev"><i class="fas fa-caret-left text-white"></i></button>
                            Page: <input type="number" value="1" size="4" min="1" max="1000" tabindex="15" id="page_num"> / 
                        <span id="page_count"></span>
                        <button class="bg-transparent border-0 " id="next"><i class="fas fa-caret-right text-white next"></i></button>
                        </span>                  
                        <button type="button" class="ml-auto close" data-dismiss="modal" data-toggle="tooltip" data-placement="bottom" title="Close"><span class="text-white-50 text-show-close" 
                                aria-hidden="true">&times;</span><span class=" sr-only text-white">Close</span></button>
                        
                    </div>
                    <div class="modal-body show-body">

                        <canvas id="the-canvas"></canvas>
                    </div>
                </div>
            </div>
        </div>
    @section('script')
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.7.570/pdf.min.js"
        integrity="sha512-g4FwCPWM/fZB1Eie86ZwKjOP+yBIxSBM/b2gQAiSVqCgkyvZ0XxYPDEcN2qqaKKEvK6a05+IPL1raO96RrhYDQ=="
        crossorigin="anonymous"></script> --}}

        <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        {{-- <script src="{{asset('js/CoreControls.js')}}"></script>
        <script src="{{asset('js/PDFJSDocumentType.js')}}"></script>
        <script src="{{asset('js/UIConfig.js')}}"></script>
        <script src="{{asset('js/webviewer-ui.min.js')}}"></script> --}}
        <script type="text/javascript">
        


            $('.read-more-content').addClass('hide_content')
            $('.read-more-show2, .read-more-hide').removeClass('hide_content')

            // Set up the toggle effect:
            $('.read-more-show2').on('click', function(e) {
              $(this).next('.read-more-content').removeClass('hide_content');
              $(this).addClass('hide_content');
              e.preventDefault();
            });

            // Changes contributed by @diego-rzg
            $('.read-more-hide').on('click', function(e) {
              var p = $(this).parent('.read-more-content');
              p.addClass('hide_content');
              p.prev('.read-more-show2').removeClass('hide_content'); // Hide only the preceding "Read More"
              e.preventDefault();
            });
            // If absolute URL from the remote server is provided, configure the CORS
            // header on that server.
            // var url =
            //     'https://raw.githubusercontent.com/mozilla/pdf.js/ba2edeae/web/compressed.tracemonkey-pldi-09.pdf';
            var pdf = `<?php echo strval("$ebook->pdf"); ?>`
            var url = `{{ asset('uploaded/pdf/${pdf}') }}`
            // var url = fak.toString();
            console.log(url);
            // Loaded via <script> tag, create shortcut to access PDF.js exports.
            var pdfjsLib = window['pdfjs-dist/build/pdf'];
            // The workerSrc property shall be specified.
            pdfjsLib.GlobalWorkerOptions.workerSrc = '//mozilla.github.io/pdf.js/build/pdf.worker.js';
       
           

            var pdfDoc = null,
                        pageNum = 1,
                        pageRendering = false,
                        pageNumPending = null,
                        scale=1.8,
                        width= 400,
                        height= 300,
                        autoCenter= true,
                        canvas = document.getElementById('the-canvas'),
                        ctx = canvas.getContext('2d');

           

           
            /**
             * Get page info from document, resize canvas accordingly, and render page.
             * @param num Page number.
             */

            function renderPage(num) {
                pageRendering = true;
                // Using promise to fetch the page
                pdfDoc.getPage(num).then(function(page) {
                    var viewport = page.getViewport({
                        scale: scale
                    });
                    canvas.height = viewport.height;
                    canvas.width = viewport.width;
                    // Render PDF page into canvas context
                    var renderContext = {
                        canvasContext: ctx,
                        viewport: viewport
                    };
                    var renderTask = page.render(renderContext);
                    // Wait for rendering to finish
                    renderTask.promise.then(function() {
                        pageRendering = false;
                        if (pageNumPending !== null) {
                            // New page rendering is pending
                            renderPage(pageNumPending);
                            pageNumPending = null;
                        }
                    });
                });
                // Update page counters
                document.getElementById('page_num').textContent = num;
            }
            /**
             * If another page rendering in progress, waits until the rendering is
             * finised. Otherwise, executes rendering immediately.
             */
            function queueRenderPage(num) {
                if (pageRendering) {
                    pageNumPending = num;
                } else {
                    renderPage(num);
                }
            }
            /**
             * Displays previous page.
             */
            function onPrevPage() {
                if (pageNum <= 1)
                {
                    return;
                }
                pageNum -- ;
                queueRenderPage(pageNum)
                document.getElementById("page_num").value = pageNum;
          
            }
              /**
             * Displays next page.
             */
             function onNextPage() {
                if (pageNum >= pdfDoc.numPages) {
                    return;
                }
                pageNum++;
                queueRenderPage(pageNum)
                document.getElementById("page_num").value = pageNum;
            }

            // Key code
            document.onkeydown = checkKey;

            function checkKey(e) {
                e = e || window.event;

                if (e.keyCode == '37') {
                    // console.log('kanan');
                    onPrevPage();
                }
                if (e.keyCode == '39') {
                    onNextPage()
                }
            }
         

            document.getElementById('prev').addEventListener('click', onPrevPage);
          
            document.getElementById('next').addEventListener('click', onNextPage);
            /**
             * Asynchronously downloads PDF.
             */
                
            //Zoom in
            document.getElementById('zoominbutton').addEventListener('click', function(){
                scale += 0.1;
                queueRenderPage(pageNum);
            });

            //Zoom out
            document.getElementById('zoomoutbutton').addEventListener('click', function(){
                scale -= 0.1;
                queueRenderPage(pageNum);
            });
           
            pdfjsLib.getDocument(url).promise.then(function(pdfDoc_) {
                pdfDoc = pdfDoc_;
                document.getElementById('page_count').textContent = pdfDoc.numPages;
                let totalHalaman = document.getElementById('page_max').textContent = pdfDoc.numPages;
                // Initial/first page rendering
                renderPage(pageNum);
            })
          
            // Responsive Must be Reloaded first
            mobileSmall();
            function mobileSmall(){

                const mql = window.matchMedia('screen and (min-width: 320px) and (max-width:420px)');

                checkMedia(mql);
                mql.addListener(checkMedia);

                function checkMedia(mql){
                    scale; 
                    if(mql.matches){
                        window.scale=0.8;
                        // console.log('Mobile');
                      
                    }
                }
            }
            
            mobileLarge();
            function mobileLarge(){

                const mql = window.matchMedia('screen and (min-width: 425px) and (max-width:768px)');

                checkMedia(mql);
                mql.addListener(checkMedia);

                function checkMedia(mql){
                    scale; 
                    if(mql.matches){
                        window.scale=1;
                        // console.log('Mobile Large');
                      
                    }
                }
            }

            tablet();
            function tablet(){

                const mql = window.matchMedia('screen and (min-width: 576px) and (max-width: 991px)');

                checkMedia(mql);
                mql.addListener(checkMedia);

                function checkMedia(mql){
                    scale;
                    if(mql.matches){
                        window.scale=1.4;
                        // console.log('tablet');
                    }
                }
            }
            let halamanSekarang = document.getElementById('page_num_progress').textContent = num;
            let widthProgress = document.getElementById('test')
            widthProgress.style.width = (halamanSekarang / totalHalaman) * 100 + "%"
        </script>
    @endsection

        {{-- Thumbnail Detil Buku --}}

        <div class="col-12 col-lg-6 col-md-12 col-sm-12 mr-lg-5">
            <div class="d-flex flex-column">
                <div class="card rounded shadow-sm border-0">
                    <img class="thumbnail-gambar-1" src="{{ asset('uploaded/gambar/' . $ebook->gambar) }}" alt="">
                    <img class="thumbnail-gambar-2" src="{{ asset('uploaded/gambar/' . $ebook->gambar) }}" alt="">
                    <div class="card-body">
                        <h5 class="card-text mb-3"> {{ $ebook->kategori }} </h5>
                        <h4 class="card-title font-weight-bold text-dark"
                            style="white-space:nowrap;overflow:hidden;text-overflow: ellipsis;">{{ $ebook->judul }}
                        </h4>
                        <p class="card-text">{{ $ebook->penulis }}</p>
                        <p class="text-justify">
                        @if(strlen( $ebook->deskripsi ) > 40) 
                        {{substr($ebook->deskripsi,0,100)}}
                            <span class="read-more-show2 hide_content">More<i class="fa fa-angle-down"></i></span>
                            <span class="read-more-content"> {{substr($ebook->deskripsi,100,strlen($ebook->deskripsi))}} 
                            <span class="read-more-hide hide_content">Less <i class="fa fa-angle-up"></i></span> </span>
                         @else
                            {{$ebook->deskripsi}}
                        @endif
                        </p>
                    </div>

                    <div class="card-footer small mb-3  mt-n3 bg-transparent border-0 text-muted">
                        <button class="btn biru-unggulan-button btn-baca-sekarang text-center rounded-pill"
                            data-toggle="modal" data-target="#bacaEbook">Baca
                            Sekarang
                        </button>
                    </div>
                </div>
                <h4 class="mt-4">Progress Baca</h4>
            <div id="myProgress" class="rounded-pill mt-3 bg-light shadow myProgress">
                <div id="test" class="rounded-pill myBar"><span id="page_num_progress"></span> / <span id="page_max"></span>
                </div>
            </div>
            </div>
        </div>
        {{-- Akhir Thumbnail Detil Buku --}}


        {{-- Kotak-daftar-isi --}}
        {{-- Awal Daftar Isi --}}
      

        <div class="col-12 col-lg-5 col-md-12 col-sm-12 kolom-daftar-isi">
            <h5 class="mt-lg-0 mb-lg-0 mt-4 mb-3">Ebook Lainnya</h5>
    
        @foreach ($related as $r) 
        <a href="/kategori-ebook/{{ $r->slug }}" style="text-decoration: none;">
        <div class="d-flex bg-white align-items-start align-items-md-center align-items-lg-center flex-row flex-md-row flex-lg-row shadow my-3" >
            <img src="{{ asset('uploaded/gambar/' . $r->gambar) }}" width="100px" height="140px" class="border" alt="buku">
            <div class="d-flex flex-column my-auto w-75 p-3" style="color: #16325C">
                <div class="home-text-kotak-h4 text-left text-md-left text-lg-left read-more-show"> {{ $r->judul }}</div>
                <div class="home-text-kotak-h5 text-left text-md-left text-lg-left read-more-show small text-muted"> {{ $r->penulis }}</div>
                <p class="text-lg-justify read-more-show" >{{ $ebook->deskripsi }} Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates earum fugiat ipsam saepe tempora sit sint nihil veritatis ducimus quasi.</p>
              
                    {{-- <button
                        class="btn biru-unggulan-button ml-home px-home mt-2 mt-lg-0 py-2 my-auto mb-home mr-0 mr-lg-4 text-white align-self-lg-end align-self-md-end align-self-center">
                        Lanjutkan</button> --}}
            </div>
        </div>
         </a>
        @endforeach
    
        </div>
        {{-- Akhir Daftar Isi --}}
    </div>

</div>
@endsection
@section('script')

<script type="text/javascript">
  // Hide the extra content initially, using JS so that if JS is disabled, no problemo:


</script>
@endsection
