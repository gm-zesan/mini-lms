@extends('frontend.layouts.app')


@section('title')
    Contact
@endsection


@section('content')
    <div style="position: fixed; top: -20px; left: 50%; transform: translate(-50%, -50%); background-image: linear-gradient(to right, #10ac9e, #f9af22); color: #fff; padding: 5px 15px; border-radius: 5px; display: flex; align-items: center; gap: 10px; opacity: 0; z-index: -1;"
        id="success-message">
    </div>

    <main class="overflow-hidden">
        <!-- inner home -->
        <div class="inner_home" style="background-image: url({{ asset('frontend/img/bannr-img.jpg') }});">
            <div class="container">
                <img src="{{ asset('frontend/img/heading-img.png') }}" alt="icon">
                <h2>Contact Us</h2>
            </div>
        </div>
        <!-- contact_area -->
        <div class="contact_area">
            <div class="container">
                <div class="heading text-center">
                    <img src="{{ asset('frontend/img/heading-img.png') }}" alt="icon">
                    <p>Help and guide you</p>
                    <h2>Dont Be a Stranger Just Say Hello</h2>
                </div>
                <div class="row mt_50">
                    <div class="col-lg-7 mt_50">
                        <form class="donate_from_cart" onsubmit="formSubmition('{{ route('frontend.contact.store') }}')">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" name="name" placeholder="Your Name">
                                </div>
                                <div class="col-lg-6">
                                    <input type="email" name="email" placeholder="Your Email">
                                </div>
                                <div class="col-lg-6">
                                    <input type="tel" name="phone" placeholder="Your Phone">
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" name="subject" placeholder="Subject">
                                </div>
                                <div class="col-lg-12">
                                    <textarea name="message" placeholder="Message"></textarea>
                                </div>
                                <div class="col-lg-6">
                                    <button type="submit" class="button">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-5 mt_50">
                        <div class="contact-us">
                            <div>
                                <h4>Phone No:</h4>
                                <a href="tel:+8801921324091">+8801921324091</a>
                            </div>
                            <i>
                                <img src="{{ asset('frontend/img/cont-1.svg') }}" alt="">
                            </i>
                        </div>
                        <div class="contact-us">
                            <div>
                                <h4>Email Address:</h4>
                                <a href="mailto:gmzesan7767@gmail.com">gmzesan7767@gmail.com</a>
                            </div>
                            <i>
                                <img src="{{ asset('frontend/img/cont-2.svg') }}" alt="">
                            </i>
                        </div>
                        <div class="contact-us">
                            <div>
                                <h4>Location:</h4>
                                <p>House # 42, Road # 10, Nikunja 2, Dhaka-1229, Bangladesh</p>
                            </div>
                            <i>
                                <img src="{{ asset('frontend/img/cont-3.svg') }}" alt="">
                            </i>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="iframe_area mb_30">
            <div class="container">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7299.263252442987!2d90.4160378!3d23.83169489999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1750952986586!5m2!1sen!2sbd" width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </main>
@endsection

@push('scripts')
    <script>
        function formSubmition(url) {
            event.preventDefault();
            var form = $(event.target);
            var formData = new FormData(form[0]);
            $.ajax({
                type: 'POST',
                url: url,
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    var $messageElement = $('#success-message');
                    $messageElement.html('');
                    $messageElement.css({ opacity: 0, zIndex: 1026, top: '-20px' });
                    var svgIcon = `
                        <svg xmlns="http://www.w3.org/2000/svg" height="14" width="14" viewBox="0 0 512 512">
                            <path fill="#ffffff" d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
                        </svg>
                    `;

                    if (response.success) {
                        $messageElement.html(svgIcon + ' ' + response.message); 
                        $messageElement.css({ top: '65px', opacity: 1 }).hide().fadeIn(300);
                        setTimeout(function() {
                            $messageElement.fadeOut(300, function() {
                                $(this).css({ zIndex: -1, top: '-20px' });
                            });
                        }, 3000);

                        form[0].reset();
                        $('html, body').animate({ scrollTop: 0 }, 100);
                    } else {
                        $.each(response.errors, function(key, value) {
                            var errorElement = $('#' + key + '_error');
                            if (errorElement.length) {
                                errorElement.html(value);
                                $('html, body').animate({ scrollTop: errorElement.offset().top - 100 }, 100);
                            }
                        });
                    }
                }
            });
        }
    </script>
@endpush
