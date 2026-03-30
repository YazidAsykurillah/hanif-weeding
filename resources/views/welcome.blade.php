<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- Open Graph Meta Tags -->
        <meta property="og:title" content="Undangan Pernikahan Hanif & Agung">
        <meta property="og:description" content="Kami mengundang Anda untuk hadir di hari bahagia kami.">
        <meta property="og:image" content="{{ asset('asset/the_couple.jpeg') }}">
        <meta property="og:url" content="https://hanif-wedding.my.id/">
        <meta property="og:type" content="website">

        <!-- Twitter Card Tags -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="Undangan Pernikahan Hanif & Agung">
        <meta name="twitter:description" content="Kami mengundang Anda untuk hadir di hari bahagia kami.">
        <meta name="twitter:image" content="{{ asset('asset/the_couple.jpeg') }}">

        <title>Agung & Hanif - Wedding Invitation</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Inter:wght@300;400;500;600&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&display=swap" rel="stylesheet">
        
        <!-- Icons -->
        <script src="https://unpkg.com/lucide@latest"></script>

        <!-- Tailwind CSS via Vite -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            /* Custom utility classes mimicking the specific typography requirements */
            .font-serif {
                font-family: 'Playfair Display', serif;
            }
            .font-sans {
                font-family: 'Inter', sans-serif;
            }
            .font-script {
                font-family: 'Great Vibes', cursive;
            }
            
            /* Hide scrollbar for gallery if needed */
            .no-scrollbar::-webkit-scrollbar {
                display: none;
            }
            .no-scrollbar {
                -ms-overflow-style: none;  /* IE and Edge */
                scrollbar-width: none;  /* Firefox */
            }
        </style>
    <body class="font-sans antialiased text-gray-800 bg-[#FAFAFA] min-h-screen flex flex-col selection:bg-gray-200">

        <!-- Header / Hero Section (Gate) -->
        <header class="w-full max-w-7xl mx-auto px-6 py-8 md:py-16 flex flex-col md:flex-row items-center justify-center min-h-screen">
            <div class="w-full md:w-1/2 flex flex-col text-center md:text-left z-10">
                
                <!-- Small dates / "To the wedding of" -->
                <div class="flex items-center space-x-2 mb-4 justify-center md:justify-start">
                    <span class="text-xs uppercase tracking-widest text-gray-500 font-medium">25. 04. 2026</span>
                    <span class="w-8 h-px bg-gray-400"></span>
                    <span class="text-xs uppercase tracking-widest text-gray-500 font-medium">Saturday</span>
                </div>
                
                <p class="font-script text-3xl md:text-4xl text-gray-600 mb-2 mt-4 ml-0 md:ml-4 tracking-wider">Undangan Pernikahan</p>
                <h1 class="font-serif text-5xl md:text-7xl lg:text-8xl font-medium tracking-tight leading-tight text-gray-900 mb-6 drop-shadow-sm">
                    {{ $bride->nickname ?? 'Hanif' }}<br/><span class="text-4xl md:text-6xl">&</span> <br/> {{ $groom->nickname ?? 'Agung' }}
                </h1>
                <div class="mb-8">
                    <p class="text-sm font-medium text-gray-500 uppercase tracking-widest mb-1">Dear Sir/Madam:</p>
                    <p id="guest-name" class="font-serif text-2xl text-gray-800">Name of the guest</p>
                </div>

                <div class="mt-4 md:mt-2">
                    <button id="open-invitation-btn" class="px-8 py-4 border border-gray-400 text-gray-700 hover:bg-gray-900 hover:text-white uppercase tracking-widest text-sm font-medium transition-all duration-300 rounded focus:outline-none">
                        Open Invitation
                    </button>
                </div>
            </div>
            
            <div class="w-full md:w-1/2 mt-12 md:mt-0 flex justify-center md:justify-end relative">
                <!-- Arched Image Container -->
                <div class="relative w-72 h-96 md:w-96 md:h-[32rem] overflow-hidden rounded-t-full shadow-xl bg-gray-200">
                    <img src="{{ asset('asset/the_couple.jpeg') }}" alt="Agung and Hanif" class="w-full h-full object-cover rounded-t-full transition-transform duration-700 hover:scale-105" loading="lazy" />
                </div>
                <!-- Subtle decorative background element -->
                <div class="absolute -z-10 w-full h-full border border-gray-300 rounded-t-full top-4 -right-4 md:-right-8 opacity-50"></div>
            </div>
        </header>

        <!-- Hidden Scrollable Content -->
        <div id="invitation-content" class="hidden opacity-0 transition-opacity duration-1000">

            <!-- The Couple Section -->
            <section id="the-couple" class="py-24 bg-white">
            <div class="max-w-4xl mx-auto px-6 text-center">
                <div class="flex flex-col md:flex-row items-center justify-center space-y-8 md:space-y-0 md:space-x-12 relative">
                    <!-- Bride -->
                    <div class="flex flex-col items-center z-10 w-full md:w-1/3">
                        <div class="w-48 h-48 rounded-full overflow-hidden border-4 border-white shadow-lg mb-4">
                            <img src="{{ $bride && $bride->image ? asset('storage/' . $bride->image) : 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?q=80&w=400&auto=format&fit=crop' }}" alt="The Bride" class="w-full h-full object-cover object-top" loading="lazy" />
                        </div>
                        <h3 class="font-serif text-2xl mb-1 text-gray-800 text-center">{{ $bride->full_name ?? 'Hanif' }}</h3>
                        <p class="text-xs uppercase tracking-widest text-gray-500 mb-3">Mempelai Wanita</p>
                        @if($bride && ($bride->father_name || $bride->mother_name))
                            <p class="text-sm text-gray-500 text-center leading-relaxed">
                                Putri dari<br/>Bapak {{ $bride->father_name ?? '...' }} & Ibu {{ $bride->mother_name ?? '...' }}
                            </p>
                        @endif
                    </div>

                    <!-- Ampersand -->
                    <div class="text-6xl font-serif italic text-gray-300 px-4 z-0 hidden md:block shrink-0">&</div>

                    <!-- Groom -->
                    <div class="flex flex-col items-center z-10 w-full md:w-1/3">
                        <div class="w-48 h-48 rounded-full overflow-hidden border-4 border-white shadow-lg mb-4">
                            <img src="{{ $groom && $groom->image ? asset('storage/' . $groom->image) : 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=400&auto=format&fit=crop' }}" alt="The Groom" class="w-full h-full object-cover object-top" loading="lazy">
                        </div>
                        <h3 class="font-serif text-2xl mb-1 text-gray-800 text-center">{{ $groom->full_name ?? 'Agung' }}</h3>
                        <p class="text-xs uppercase tracking-widest text-gray-500 mb-3">Mempelai Pria</p>
                        @if($groom && ($groom->father_name || $groom->mother_name))
                            <p class="text-sm text-gray-500 text-center leading-relaxed">
                                Putra dari<br/>Bapak {{ $groom->father_name ?? '...' }} & Ibu {{ $groom->mother_name ?? '...' }}
                            </p>
                        @endif
                    </div>
                    
                </div>
            </div>
        </section>

        <!-- Wedding Day Schedule -->
        <section class="py-24 bg-[#FAFAFA]">
            <div class="max-w-5xl mx-auto px-6 text-center">
                <div class="mb-12 flex flex-col items-center">
                    <i data-lucide="calendar-heart" class="w-8 h-8 text-gray-400 mb-4"></i>
                    <h2 class="font-serif text-4xl mb-4 text-gray-900">Wedding Day</h2>
                    <div class="flex justify-center space-x-4 text-gray-600 mb-6">
                        <span class="px-4 py-2 border border-gray-300 rounded flex items-center justify-center">25</span>
                        <span class="px-4 py-2 border border-gray-300 rounded flex items-center justify-center uppercase tracking-wider text-xs">April</span>
                        <span class="px-4 py-2 border border-gray-300 rounded flex items-center justify-center">2026</span>
                    </div>
                    <div class="w-24 h-px bg-gray-300 mt-2"></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mt-16 max-w-4xl mx-auto">
                    <!-- Schedule Item 1 -->
                    <div class="flex flex-col items-center group cursor-pointer">
                        <span class="text-xs text-blue-500 font-semibold uppercase tracking-widest mb-3 transition-colors group-hover:text-blue-600">Morning</span>
                        <h4 class="font-serif text-2xl text-gray-900 mb-2">Akad Nikah</h4>
                        <p class="text-gray-500 text-sm mb-4">08:00 WIB</p>
                        
                    </div>
                    
                    <!-- Schedule Item 2 -->
                    <div class="flex flex-col items-center group cursor-pointer relative">
                        <!-- Desktop Separator Left -->
                        <div class="hidden md:block absolute left-0 top-1/2 w-px h-24 bg-gray-200 -mt-12 -ml-6"></div>
                        <span class="text-xs text-blue-500 font-semibold uppercase tracking-widest mb-3 transition-colors group-hover:text-blue-600">Afternoon</span>
                        <h4 class="font-serif text-2xl text-gray-900 mb-2">Resepsi Pernikahan</h4>
                        <p class="text-gray-500 text-sm mb-4">11:00 - 12:30 WIB</p>
                        
                    </div>
                </div>

                <!-- Google Map Location -->
                <div class="mt-20 max-w-4xl mx-auto flex flex-col items-center">
                    <i data-lucide="map-pin" class="w-6 h-6 text-gray-400 mb-3"></i>
                    <h4 class="font-serif text-2xl text-gray-900 mb-3">Lokasi Acara</h4>
                    <p class="text-gray-600 text-sm text-center leading-relaxed max-w-lg mb-8">
                        Auditorium Poltekkes Kemenkes Semarang.<br/>
                        Jalan Tirto Agung, Pedalangan, Kec. Banyumanik, Kota Semarang, Jawa Tengah 50268
                    </p>
                    <div class="w-full h-80 rounded-xl overflow-hidden shadow-lg border border-gray-200">
                        <iframe 
                            src="https://maps.google.com/maps?q=Auditorium%20Poltekkes%20Kemenkes%20Semarang,%20Pedalangan,%20Semarang&t=&z=15&ie=UTF8&iwloc=&output=embed" 
                            width="100%" 
                            height="100%" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                    <a href="https://maps.google.com/maps?q=Auditorium%20Poltekkes%20Kemenkes%20Semarang,%20Pedalangan,%20Semarang" target="_blank" class="mt-6 px-6 py-3 border border-gray-400 text-gray-700 hover:bg-gray-900 hover:text-white uppercase tracking-widest text-xs font-medium transition-all duration-300 rounded focus:outline-none flex items-center gap-2">
                        Get Directions
                    </a>
                </div>
            </div>
        </section>

        <!-- Save the Date Video (Mock) -->
        <section class="max-w-6xl mx-auto px-6 py-12">
            <div class="w-full h-80 md:h-[32rem] relative rounded-xl overflow-hidden shadow-2xl group cursor-pointer">
                <img src="https://images.unsplash.com/photo-1519741497674-611481863552?q=80&w=1200&auto=format&fit=crop" alt="Save the Date Video" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" loading="lazy" />
                <div class="absolute inset-0 bg-black/40 flex flex-col items-center justify-center transition-colors group-hover:bg-black/50">
                    <h3 class="font-script text-5xl md:text-7xl text-white mb-6 drop-shadow-lg">Save The Date</h3>
                    <div class="w-20 h-20 bg-white/20 backdrop-blur rounded-full flex items-center justify-center border border-white/30 text-white shadow-lg transition-transform group-hover:scale-110">
                        <i data-lucide="play" class="w-8 h-8 ml-1"></i>
                    </div>
                </div>
            </div>
        </section>

        <!-- Our Moments Gallery -->
        <section class="py-24 bg-[#333333] mt-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6">
                <h2 class="font-serif text-3xl md:text-4xl text-center text-white mb-16 font-light tracking-wide">Momen Kebersamaan Kami</h2>
                
                <!-- Masonry-style grid layout -->
                <div class="columns-1 md:columns-2 lg:columns-3 gap-4 space-y-4">
                    <div class="break-inside-avoid relative group overflow-hidden rounded shadow">
                        <img src="https://images.unsplash.com/photo-1532712938310-34cb3982ef74?q=80&w=500&auto=format&fit=crop&grayscale=true" class="w-full object-cover block transition-transform duration-700 group-hover:scale-105" alt="Moment 1" loading="lazy">
                        <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                    <div class="break-inside-avoid relative group overflow-hidden rounded shadow">
                        <img src="https://images.unsplash.com/photo-1606800052052-a08af7148866?q=80&w=500&auto=format&fit=crop&grayscale=true" class="w-full object-cover block transition-transform duration-700 group-hover:scale-105" alt="Moment 2" loading="lazy">
                    </div>
                    <div class="break-inside-avoid relative group overflow-hidden rounded shadow">
                        <img src="https://images.unsplash.com/photo-1465495976277-4387d4b0b4c6?q=80&w=500&auto=format&fit=crop&grayscale=true" class="w-full object-cover block transition-transform duration-700 group-hover:scale-105" alt="Moment 3" loading="lazy">
                    </div>
                    <div class="break-inside-avoid relative group overflow-hidden rounded shadow lg:mt-0">
                        <img src="https://images.unsplash.com/photo-1519225421980-715cb0215aed?q=80&w=500&auto=format&fit=crop&grayscale=true" class="w-full object-cover block transition-transform duration-700 group-hover:scale-105" alt="Moment 4" loading="lazy">
                    </div>
                    <div class="break-inside-avoid relative group overflow-hidden rounded shadow">
                        <img src="https://images.unsplash.com/photo-1520854221256-17451cc331bf?q=80&w=500&auto=format&fit=crop&grayscale=true" class="w-full object-cover block transition-transform duration-700 group-hover:scale-105" alt="Moment 5" loading="lazy">
                    </div>
                    <div class="break-inside-avoid relative group overflow-hidden rounded shadow">
                        <img src="https://images.unsplash.com/photo-1529636798458-92182e662485?q=80&w=500&auto=format&fit=crop&grayscale=true" class="w-full object-cover block transition-transform duration-700 group-hover:scale-105" alt="Moment 6" loading="lazy">
                    </div>
                </div>
            </div>
        </section>

        <!-- Quote -->
        <section class="py-32 bg-white text-center px-6">
            <div class="max-w-3xl mx-auto shadow-sm border border-gray-100 p-12 rounded-xl bg-white relative">
                <i data-lucide="quote" class="w-10 h-10 text-gray-200 absolute -top-5 left-1/2 transform -translate-x-1/2 bg-white px-2"></i>
                <h3 class="font-serif text-xl md:text-2xl text-gray-800 leading-relaxed italic mb-4">
                    "Dan di antara tanda-tanda kebesaran-Nya ialah Dia menciptakan pasangan-pasangan untukmu dari jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya, dan Dia menjadikan di antaramu rasa kasih dan sayang."
                </h3>
                <p class="text-gray-500 text-sm uppercase tracking-widest">— QS. Ar-Rum: 21</p>
            </div>
        </section>

        <!-- Our Love Story -->
        <section class="py-24 bg-[#FAFAFA]">
            <div class="max-w-6xl mx-auto px-6">
                <h2 class="font-serif text-3xl md:text-4xl text-center text-gray-900 mb-16">Cerita Cinta Kami</h2>
                
                <div class="space-y-16">
                    <!-- Story Block 1 -->
                    <div class="flex flex-col md:flex-row items-center gap-8 md:gap-16">
                        <!-- Text -->
                        <div class="w-full md:w-1/2 text-center md:text-left order-2 md:order-1 p-8 bg-white border border-gray-100 shadow-sm rounded-xl">
                            <span class="text-xs text-gray-400 uppercase tracking-widest mb-2 block">April 2022</span>
                            <h3 class="font-serif text-2xl text-gray-900 mb-4">First Met</h3>
                            <p class="text-gray-600 leading-relaxed text-sm">We first crossed paths at a mutual friend's gathering. A simple conversation over morning coffee quickly turned into a deep connection that changed the course of our lives.</p>
                        </div>
                        <!-- Image -->
                        <div class="w-full md:w-1/2 order-1 md:order-2">
                            <img src="https://images.unsplash.com/photo-1469334031218-e382a71b716b?q=80&w=600&auto=format&fit=crop" alt="First Met" class="w-full h-80 object-cover rounded-xl shadow-md md:grayscale md:hover:grayscale-0 transition-all duration-500" loading="lazy">
                        </div>
                    </div>

                    <!-- Story Block 2 -->
                    <div class="flex flex-col md:flex-row items-center gap-8 md:gap-16">
                        <!-- Image -->
                        <div class="w-full md:w-1/2 order-1">
                            <img src="https://images.unsplash.com/photo-1511895426328-dc8714191300?q=80&w=600&auto=format&fit=crop" alt="The Proposal" class="w-full h-80 object-cover rounded-xl shadow-md md:grayscale md:hover:grayscale-0 transition-all duration-500" loading="lazy">
                        </div>
                        <!-- Text -->
                        <div class="w-full md:w-1/2 text-center md:text-left order-2 p-8 bg-white border border-gray-100 shadow-sm rounded-xl">
                            <span class="text-xs text-gray-400 uppercase tracking-widest mb-2 block">December 2024</span>
                            <h3 class="font-serif text-2xl text-gray-900 mb-4">The Proposal</h3>
                            <p class="text-gray-600 leading-relaxed text-sm">On a quiet winter evening, beneath a sky full of stars during our trip to Kyoto, Agung asked the question. With joyful tears, Hanif said 'Yes', and our forever began.</p>
                        </div>
                    </div>

                    <!-- Story Block 3 -->
                    <div class="flex flex-col md:flex-row items-center gap-8 md:gap-16">
                        <!-- Text -->
                        <div class="w-full md:w-1/2 text-center md:text-left order-2 md:order-1 p-8 bg-white border border-gray-100 shadow-sm rounded-xl">
                            <span class="text-xs text-gray-400 uppercase tracking-widest mb-2 block">August 2025</span>
                            <h3 class="font-serif text-2xl text-gray-900 mb-4">Pre-Wedding Trip</h3>
                            <p class="text-gray-600 leading-relaxed text-sm">We traveled across Europe together, capturing beautiful moments along the Amalfi Coast, making memories that laid the foundation for our impending union.</p>
                        </div>
                        <!-- Image -->
                        <div class="w-full md:w-1/2 order-1 md:order-2">
                            <img src="https://images.unsplash.com/photo-1473691955023-da1c49c95c78?q=80&w=600&auto=format&fit=crop" alt="Pre-Wedding" class="w-full h-80 object-cover rounded-xl shadow-md md:grayscale md:hover:grayscale-0 transition-all duration-500" loading="lazy">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- RSVP Form Section -->
        <section class="relative py-32 bg-gray-900">
            <!-- Background Image -->
            <img src="https://images.unsplash.com/photo-1522673607200-164d1b6ce486?q=80&w=1200&auto=format&fit=crop" alt="RSVP Background" class="absolute inset-0 w-full h-full object-cover opacity-40 mix-blend-overlay" loading="lazy">
            
            <div class="relative z-10 max-w-xl mx-auto px-6">
                <!-- Outer mock container -->
                <div class="bg-black/60 backdrop-blur-sm p-10 md:p-14 rounded-2xl border border-white/10 shadow-2xl">
                    <h2 class="font-serif text-4xl mb-2 text-white text-center">Buku Tamu</h2>
                    <p class="text-center text-gray-300 text-sm mb-8">Kehadiran anda merupakan harapan kami.</p>
                    
                    @if(session('success'))
                        <div class="bg-green-500/10 border border-green-500/20 text-green-400 text-center rounded-lg p-4 mb-6">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form class="space-y-6" action="{{ route('rsvp.store') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-xs uppercase tracking-widest text-gray-400 mb-2">Nama Depan</label>
                                <input type="text" name="first_name" class="w-full bg-white/5 border border-white/20 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-white/50 transition-colors" placeholder="John" required>
                            </div>
                            <div>
                                <label class="block text-xs uppercase tracking-widest text-gray-400 mb-2">Nama Belakang</label>
                                <input type="text" name="last_name" class="w-full bg-white/5 border border-white/20 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-white/50 transition-colors" placeholder="Doe" required>
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-xs uppercase tracking-widest text-gray-400 mb-2">Nomor Telepon</label>
                            <input type="tel" name="phone_number" class="w-full bg-white/5 border border-white/20 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-white/50 transition-colors" placeholder="+62 812 3456 7890" required>
                        </div>
                        
                        <div>
                            <label class="block text-xs uppercase tracking-widest text-gray-400 mb-2">Konfirmasi Kehadiran</label>
                            <select name="is_attending" class="w-full bg-white/5 border border-white/20 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-white/50 transition-colors appearance-none" required>
                                <option value="" disabled selected class="text-gray-900">Silahkan pilih...</option>
                                <option value="yes" class="text-gray-900">Tentu, saya akan hadir</option>
                                <option value="no" class="text-gray-900">Maaf, saya tidak bisa menghadiri</option>
                            </select>
                        </div>

                        <button type="submit" class="w-full bg-white text-gray-900 hover:bg-gray-200 uppercase tracking-widest text-sm font-semibold py-4 rounded-lg transition-colors cursor-pointer mt-4">
                            Kirim Jawaban
                        </button>
                    </form>
                </div>
            </div>
        </section>

        <!-- Gift Section -->
        <section class="py-24 bg-white">
            <div class="max-w-4xl mx-auto px-6 text-center">
                <i data-lucide="gift" class="w-8 h-8 mx-auto text-gray-400 mb-6"></i>
                <h2 class="font-serif text-3xl md:text-4xl text-gray-900 mb-6 font-light">Send Your Gift</h2>
                <p class="text-gray-500 mb-12 max-w-xl mx-auto text-sm leading-relaxed">Your presence at our wedding is the greatest gift of all. However, should you wish to help us celebrate with a gift, a registry is available below.</p>
                
                <div class="flex flex-col md:flex-row justify-center items-center gap-6">
                    <!-- Bank Transer Card -->
                    <div class="w-full md:w-64 p-8 border border-gray-200 rounded-xl hover:shadow-lg transition-shadow cursor-pointer flex flex-col items-center">
                        <i data-lucide="landmark" class="w-8 h-8 text-gray-600 mb-4"></i>
                        <h4 class="font-medium text-gray-900 mb-1">Bank Transfer</h4>
                        <p class="text-xs text-gray-500">View Details</p>
                    </div>
                    
                    <!-- PayPal Card -->
                    <div class="w-full md:w-64 p-8 border border-gray-200 rounded-xl hover:shadow-lg transition-shadow cursor-pointer flex flex-col items-center">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/PayPal.svg" alt="PayPal" class="h-6 mb-5" loading="lazy">
                        <h4 class="font-medium text-gray-900 mb-1">PayPal</h4>
                        <p class="text-xs text-gray-500">Send via PayPal</p>
                    </div>

                    <!-- Stripe Card -->
                    <div class="w-full md:w-64 p-8 border border-gray-200 rounded-xl hover:shadow-lg transition-shadow cursor-pointer flex flex-col items-center">
                        <i data-lucide="credit-card" class="w-8 h-8 text-blue-600 mb-4"></i>
                        <h4 class="font-medium text-gray-900 mb-1">Credit Card</h4>
                        <p class="text-xs text-gray-500">Secure Payment</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-[#F8F8F8] py-16 text-center text-gray-500 border-t border-gray-200">
            <div class="font-serif italic text-4xl text-gray-400 mb-6">{{ $bride ? substr($bride->nickname, 0, 1) : 'H' }}&{{ $groom ? substr($groom->nickname, 0, 1) : 'A' }}</div>
            <p class="font-script text-3xl mb-4 text-gray-600">Thank you</p>
            <p class="text-xs uppercase tracking-widest mb-8">We look forward to celebrating with you.</p>
            
            <div class="flex justify-center space-x-6 text-sm">
                <a href="#" class="hover:text-gray-800 transition-colors">Home</a>
                <a href="#" class="hover:text-gray-800 transition-colors">Story</a>
                <a href="#" class="hover:text-gray-800 transition-colors">RSVP</a>
                <a href="#" class="hover:text-gray-800 transition-colors">Contact</a>
            </div>
            
            <p class="text-xs mt-12 text-gray-400">&copy; 2026 Agung & Hanif. All rights reserved.</p>
        </footer>
        

        </div> <!-- End of Invitation Content -->

        <!-- Gate JavaScript -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Parse Guest Name from URL (?to=John%20Doe)
                const urlParams = new URLSearchParams(window.location.search);
                const guestName = urlParams.get('to');
                if (guestName) {
                    document.getElementById('guest-name').innerText = guestName;
                }

                const openBtn = document.getElementById('open-invitation-btn');
                const content = document.getElementById('invitation-content');

                openBtn.addEventListener('click', function() {
                    // Reveal the content
                    content.classList.remove('hidden');
                    // Small delay to allow CSS opacity transition to trigger
                    setTimeout(() => {
                        content.classList.remove('opacity-0');
                    }, 50);

                    // Fade out the button entirely
                    openBtn.classList.add('opacity-0', 'pointer-events-none');

                    // Smooth scroll down to the first section after a short delay
                    setTimeout(() => {
                        document.getElementById('the-couple').scrollIntoView({ behavior: 'smooth' });
                    }, 500);
                });
            });
        </script>

        <!-- Initialize Icons -->
        <script>
            lucide.createIcons();
        </script>
    </body>
</html>
