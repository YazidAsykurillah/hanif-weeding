<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth overflow-x-hidden">
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
        
        <!-- Icons & Effects -->
        <script src="https://unpkg.com/lucide@latest"></script>
        <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>

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
            
            /* Splash Ripple Effect */
            .splash-ripple {
                position: absolute;
                border-radius: 50%;
                transform: scale(0);
                animation: ripple-splash 600ms ease-out;
                background-color: rgba(255, 255, 255, 0.3);
                pointer-events: none;
            }
            @keyframes ripple-splash {
                to {
                    transform: scale(4);
                    opacity: 0;
                }

            /* Honeypot Security */
            .hp-check {
                display: none !important;
                visibility: hidden !important;
            }
        </style>
    </head>
    <body class="font-sans antialiased text-gray-800 bg-[#FAFAFA] min-h-screen flex flex-col selection:bg-gray-200 overflow-x-hidden">

        <!-- Header / Hero Section (Gate) -->
        <header class="w-full max-w-7xl mx-auto px-6 py-8 md:py-16 flex flex-col md:flex-row items-center justify-center min-h-screen">
            <div class="w-full md:w-1/2 flex flex-col text-center md:text-left z-10">
                
                <!-- Small dates / "To the wedding of" -->
                <div class="flex items-center space-x-2 mb-4 justify-center md:justify-start">
                    @if($mainAgenda)
                        <span class="text-xs uppercase tracking-widest text-gray-500 font-medium">{{ \Carbon\Carbon::parse($mainAgenda->date)->translatedFormat('l') }}</span>
                        <span class="w-8 h-px bg-gray-400"></span>
                        <span class="text-xs uppercase tracking-widest text-gray-500 font-medium">{{ \Carbon\Carbon::parse($mainAgenda->date)->translatedFormat('d F Y') }}</span>
                    @else
                        <span class="text-xs uppercase tracking-widest text-gray-500 font-medium">Minggu</span>
                        <span class="w-8 h-px bg-gray-400"></span>
                        <span class="text-xs uppercase tracking-widest text-gray-500 font-medium">26 April 2026</span>
                    @endif
                </div>
                
                <p class="font-script text-3xl md:text-4xl text-gray-600 mb-2 mt-4 ml-0 md:ml-4 tracking-wider">Undangan Pernikahan</p>
                <h1 class="font-serif text-5xl md:text-7xl lg:text-8xl font-medium tracking-tight leading-tight text-gray-900 mb-6 drop-shadow-sm">
                    {{ $bride->nickname ?? 'Hanif' }}<br/><span class="text-4xl md:text-6xl">&</span> <br/> {{ $groom->nickname ?? 'Agung' }}
                </h1>
                <div class="mb-8">
                    <p id="guest-label" class="text-xs font-medium text-gray-500 uppercase tracking-widest mb-1">Kepada Yth.</p>
                    <p id="guest-name" class="font-serif text-2xl text-gray-800">Tamu Undangan</p>
                </div>

                <div class="mt-6 md:mt-4">
                    <button id="open-invitation-btn" class="relative overflow-hidden px-10 py-4 bg-gray-900 text-white shadow-lg hover:bg-gray-800 hover:shadow-xl hover:-translate-y-0.5 transform uppercase tracking-widest text-sm font-medium transition-all duration-300 rounded-md focus:outline-none flex items-center gap-2 justify-center w-full md:w-auto">
                        <i data-lucide="mail-open" class="w-4 h-4 z-10 pointer-events-none"></i> 
                        <span class="z-10 pointer-events-none">Buka Undangan</span>
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
                    <h2 class="font-serif text-4xl mb-4 text-gray-900">Wedding Agenda</h2>
                    <div class="w-24 h-px bg-gray-300 mt-2"></div>
                </div>

                <div class="flex flex-wrap justify-center gap-8 mt-16 max-w-6xl mx-auto">
                    @forelse($agendas as $agenda)
                        <div class="w-full md:w-[calc(50%-2rem)] lg:w-[calc(33.333%-2rem)] bg-white p-8 rounded-2xl shadow-sm border border-gray-100 flex flex-col items-center group hover:shadow-md transition-all duration-300 {{ !$agenda->is_active ? 'opacity-60 grayscale-[0.5]' : '' }}">
                            <div class="text-xs text-blue-500 font-semibold uppercase tracking-widest mb-3">
                                {{ \Carbon\Carbon::parse($agenda->date)->translatedFormat('l, d F Y') }}
                            </div>
                            <h4 class="font-serif text-2xl text-gray-900 mb-2">{{ $agenda->name }}</h4>
                            <p class="text-gray-500 text-sm mb-6">
                                {{ \Carbon\Carbon::parse($agenda->start_time)->format('H:i') }} 
                                @if($agenda->end_time)
                                    - {{ \Carbon\Carbon::parse($agenda->end_time)->format('H:i') }}
                                @endif
                                WIB
                            </p>
                            
                            <div class="w-full pt-6 border-t border-gray-50 mt-auto">
                                <p class="font-medium text-gray-900 mb-1">{{ $agenda->location }}</p>
                                <p class="text-sm text-gray-500 mb-6">{{ $agenda->address }}</p>
                                
                                @if($agenda->is_main_agenda)
                                    <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($agenda->address) }}" target="_blank" class="w-full py-3 px-4 border border-gray-900 text-gray-900 hover:bg-gray-900 hover:text-white uppercase tracking-widest text-[10px] font-semibold transition-all duration-300 rounded flex items-center justify-center gap-2">
                                        <i data-lucide="map-pin" class="w-3 h-3"></i>
                                        <span>Open In Map</span>
                                    </a>
                                @endif
                            </div>

                            @if($agenda->description)
                                <p class="mt-4 text-xs italic text-gray-400 leading-relaxed">
                                    {{ $agenda->description }}
                                </p>
                            @endif
                        </div>
                    @empty
                        <div class="col-span-full py-12 text-center text-gray-400 italic">
                            Informasi agenda akan segera diperbarui.
                        </div>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- Feature Image Section -->
        <section class="py-24 bg-white overflow-hidden">
            <div class="max-w-6xl mx-auto px-6">
                <div class="relative group">
                    <!-- Elegant background accent -->
                    <div class="absolute -inset-4 bg-gray-50 rounded-[2rem] -z-10 transition-transform duration-1000 group-hover:scale-105"></div>
                    
                    <!-- Main image container with premium framing -->
                    <div class="overflow-hidden rounded-2xl shadow-2xl aspect-[4/3] md:aspect-[16/9] border border-gray-100">
                        <img src="{{ asset('asset/the_couple_2.jpeg') }}" alt="Agung and Hanif Moment" class="w-full h-full object-cover object-[center_20%] transition-transform duration-[1500ms] group-hover:scale-110" loading="lazy" />
                        
                        <!-- Soft overlay for depth -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    </div>
                    
                    <!-- Decorative Floating Elements -->
                    <div class="absolute -bottom-8 -right-8 w-40 h-40 bg-gray-900/5 backdrop-blur-xl rounded-full -z-10 group-hover:translate-x-2 group-hover:translate-y-2 transition-transform duration-1000"></div>
                    <div class="absolute -top-8 -left-8 w-32 h-32 border border-gray-200 rounded-full -z-10 group-hover:-translate-x-2 group-hover:-translate-y-2 transition-transform duration-1000"></div>
                </div>
                
                <!-- Feature Image Caption -->
                <div class="mt-12 text-center">
                    <h3 class="font-serif text-3xl md:text-4xl text-gray-900 mb-2 uppercase tracking-[0.2em]">HANYA SATU</h3>
                    <p class="font-serif italic text-gray-500 text-lg">Hanif Agung Nyata Bersatu</p>
                </div>
            </div>
        </section>

        <!-- Our Moments Gallery -->
        <section class="py-24 bg-[#333333] mt-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6">
                <h2 class="font-serif text-3xl md:text-4xl text-center text-white mb-16 font-light tracking-wide">Momen Kebersamaan Kami</h2>
                
                <!-- Masonry-style grid layout -->
                <div class="columns-1 md:columns-2 lg:columns-3 gap-4 space-y-4">
                    @forelse($moments as $moment)
                        <div class="break-inside-avoid relative group overflow-hidden rounded shadow">
                            <img src="{{ asset('storage/' . $moment->image) }}" class="w-full object-cover block transition-transform duration-700 group-hover:scale-105" alt="Moment" loading="lazy">
                            <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>
                    @empty
                        <div class="col-span-full py-12 text-center text-gray-400 italic">
                            Belum ada momen yang dibagikan.
                        </div>
                    @endforelse
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



        <!-- RSVP Form Section -->
        <section class="relative py-32 bg-gray-900">
            <!-- Background Image -->
            <img src="https://images.unsplash.com/photo-1522673607200-164d1b6ce486?q=80&w=1200&auto=format&fit=crop" alt="RSVP Background" class="absolute inset-0 w-full h-full object-cover opacity-40 mix-blend-overlay" loading="lazy">
            
            <div class="relative z-10 max-w-xl mx-auto px-6">
                <!-- Outer mock container -->
                <div class="bg-black/60 backdrop-blur-sm p-10 md:p-14 rounded-2xl border border-white/10 shadow-2xl">
                    <h2 class="font-serif text-4xl mb-2 text-white text-center">Buku Tamu</h2>
                    <p class="text-center text-gray-300 text-sm mb-8">Suatu kehormatan dan kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan hadir untuk memberikan doa restu.</p>
                    
                    @if(session('success'))
                        <div class="bg-green-500/10 border border-green-500/20 text-green-400 text-center rounded-lg p-4 mb-6">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form class="space-y-6" action="{{ route('rsvp.store') }}" method="POST">
                        @csrf
                        <!-- Honeypot -->
                        <div class="hp-check">
                            <label for="hp_website">Website</label>
                            <input type="text" name="hp_website" id="hp_website" autocomplete="off" tabindex="-1">
                        </div>
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
                            Isi Buku Tamu
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
                <p class="text-gray-500 mb-12 max-w-xl mx-auto text-sm leading-relaxed">Doa restu Anda merupakan hadiah terindah bagi kami, namun apabila berkenan dapat melalui rekening berikut:</p>
                
                <div class="flex flex-col md:flex-row flex-wrap justify-center items-stretch gap-6">
                    @forelse($bankAccounts as $account)
                        <div class="w-full md:w-64 p-8 border border-gray-200 rounded-xl hover:shadow-lg transition-shadow bg-gray-50 flex flex-col items-center">
                            @if($account->image)
                                <img src="{{ asset('storage/' . $account->image) }}" alt="{{ $account->bank_name }}" class="h-10 mb-5 object-contain" loading="lazy">
                            @else
                                <i data-lucide="landmark" class="w-8 h-8 text-gray-400 mb-5"></i>
                            @endif
                            <h4 class="font-medium text-gray-900 mb-1">{{ $account->bank_name }}</h4>
                            <p class="text-xs text-gray-500 mb-4 uppercase tracking-widest">{{ $account->bank_account_name }}</p>
                            
                            <div class="mt-auto w-full mt-4">
                                <button 
                                    onclick="copyToClipboard('{{ $account->account_number }}', this)"
                                    class="w-full text-sm font-mono bg-white border border-gray-200 rounded-md py-3 px-4 text-gray-800 tracking-wider flex items-center justify-center gap-2 group hover:bg-gray-50 transition-all duration-300 cursor-pointer focus:outline-none"
                                    title="Click to copy account number"
                                >
                                    <span class="account-number">{{ $account->account_number }}</span>
                                    <i data-lucide="copy" class="w-4 h-4 text-gray-400 group-hover:text-gray-600 transition-colors"></i>
                                </button>
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-500 text-sm italic py-8">Informasi rekening akan segera ditambahkan.</p>
                    @endforelse
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
            
            <p class="text-xs mt-12 text-gray-400 mb-2">Music : Welcome Home - Nathan Moore</p>
            <p class="text-xs text-gray-400">&copy; 2026 Agung & Hanif. All rights reserved.</p>
        </footer>
        

        </div> <!-- End of Invitation Content -->

        <!-- Audio Player & Controls -->
        <!-- Update the 'src' attribute below with your actual music file path -->
        <audio id="bg-music" loop>
            <source src="{{ asset('asset/music_back_sound.mp3') }}" type="audio/mpeg">
        </audio>

        <button id="music-toggle" class="fixed bottom-6 right-6 bg-gray-900/80 backdrop-blur-md text-white p-4 rounded-full shadow-2xl z-[100] transition-transform duration-300 hover:scale-110 hidden focus:outline-none">
            <i data-lucide="volume-2" class="w-5 h-5 pointer-events-none" id="music-icon"></i>
        </button>

        <!-- Gate JavaScript -->
        <script>
            function copyToClipboard(text, element) {
                const showSuccess = () => {
                    const icon = element.querySelector('i');
                    const originalBg = element.classList.contains('bg-white') ? 'bg-white' : 'bg-gray-50';
                    
                    // Show success state
                    icon.setAttribute('data-lucide', 'check');
                    element.classList.remove('bg-white', 'bg-gray-50');
                    element.classList.add('bg-green-50', 'border-green-200');
                    lucide.createIcons(); // Refresh icons

                    setTimeout(() => {
                        icon.setAttribute('data-lucide', 'copy');
                        element.classList.remove('bg-green-50', 'border-green-200');
                        element.classList.add(originalBg);
                        lucide.createIcons();
                    }, 2000);
                };

                const fallbackCopy = (val) => {
                    const textArea = document.createElement("textarea");
                    textArea.value = val;
                    // Ensure textarea is not visible or affecting layout
                    textArea.style.position = "fixed";
                    textArea.style.left = "-9999px";
                    textArea.style.top = "0";
                    document.body.appendChild(textArea);
                    textArea.focus();
                    textArea.select();
                    try {
                        const successful = document.execCommand('copy');
                        if (successful) showSuccess();
                    } catch (err) {
                        console.error('Fallback copy failed', err);
                    }
                    document.body.removeChild(textArea);
                };

                if (!navigator.clipboard) {
                    fallbackCopy(text);
                    return;
                }
                
                navigator.clipboard.writeText(text).then(showSuccess).catch(err => {
                    console.error('Failed to copy: ', err);
                    fallbackCopy(text);
                });
            }

            document.addEventListener('DOMContentLoaded', function() {
                // Parse Guest Name from URL (?to=John%20Doe)
                const urlParams = new URLSearchParams(window.location.search);
                const guestName = urlParams.get('to');
                if (guestName) {
                    document.getElementById('guest-name').innerText = guestName;
                }

                const openBtn = document.getElementById('open-invitation-btn');
                const content = document.getElementById('invitation-content');

                // Audio elements
                const bgMusic = document.getElementById('bg-music');
                const musicToggle = document.getElementById('music-toggle');
                const musicIcon = document.getElementById('music-icon');
                let isMusicPlaying = false;

                // Toggle music function
                musicToggle.addEventListener('click', function() {
                    if (isMusicPlaying) {
                        bgMusic.pause();
                        musicIcon.setAttribute('data-lucide', 'volume-x');
                        musicToggle.classList.replace('bg-gray-900/80', 'bg-black/40');
                    } else {
                        bgMusic.play();
                        musicIcon.setAttribute('data-lucide', 'volume-2');
                        musicToggle.classList.replace('bg-black/40', 'bg-gray-900/80');
                    }
                    isMusicPlaying = !isMusicPlaying;
                    lucide.createIcons(); // Refresh icon
                });

                openBtn.addEventListener('click', function(e) {
                    // Create an elegant inner splash/ripple effect
                    const circle = document.createElement('span');
                    const diameter = Math.max(openBtn.clientWidth, openBtn.clientHeight);
                    const radius = diameter / 2;
                    
                    let x = e.clientX ? e.clientX - openBtn.getBoundingClientRect().left : openBtn.clientWidth / 2;
                    let y = e.clientY ? e.clientY - openBtn.getBoundingClientRect().top : openBtn.clientHeight / 2;

                    circle.style.width = circle.style.height = `${diameter}px`;
                    circle.style.left = `${x - radius}px`;
                    circle.style.top = `${y - radius}px`;
                    circle.classList.add('splash-ripple');

                    // Remove existing ripples if any
                    const existingRipple = openBtn.querySelector('.splash-ripple');
                    if (existingRipple) {
                        existingRipple.remove();
                    }
                    openBtn.appendChild(circle);

                    // Trigger an elegant external particle splash (confetti)
                    const btnRect = openBtn.getBoundingClientRect();
                    const originX = (btnRect.left + (btnRect.width / 2)) / window.innerWidth;
                    const originY = (btnRect.top + (btnRect.height / 2)) / window.innerHeight;
                    
                    if (typeof confetti !== 'undefined') {
                        confetti({
                            particleCount: 50,
                            spread: 60,
                            origin: { x: originX, y: originY },
                            colors: ['#4B5563', '#9CA3AF', '#D1D5DB', '#111827'],
                            disableForReducedMotion: true,
                            zIndex: 100
                        });
                    }

                    // Reveal the content after a tiny delay so the splash can be enjoyed
                    setTimeout(() => {
                        content.classList.remove('hidden');
                        setTimeout(() => {
                            content.classList.remove('opacity-0');
                        }, 50);

                        // Start playing the background music
                        bgMusic.play().then(() => {
                            isMusicPlaying = true;
                            musicToggle.classList.remove('hidden');
                        }).catch(err => {
                            console.warn("Autoplay was prevented by browser policies:", err);
                        });

                        // Fade out the button smoothly
                        openBtn.classList.add('opacity-0', 'pointer-events-none');

                        // Smooth scroll down to the first section after a short delay
                        setTimeout(() => {
                            document.getElementById('the-couple').scrollIntoView({ behavior: 'smooth' });
                        }, 400);
                    }, 250);
                });
            });
        </script>

        <!-- Initialize Icons -->
        <script>
            lucide.createIcons();
        </script>
    </body>
</html>
