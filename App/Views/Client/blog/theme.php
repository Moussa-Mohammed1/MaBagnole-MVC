<?php

use App\Classes\Theme;

session_start();
require_once __DIR__ . '/../../../../vendor/autoload.php';
$logged = $_SESSION['logged'];
if (!isset($logged)) {
    header('Location: ./../../auth/login.php');
    exit();
}
$themes = Theme::getAllThemes();
?>

<!DOCTYPE html>

<html class="light" lang="en" class="scroll-smooth">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>MaBagnole - Community &amp; Blog</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;700;800&amp;display=swap"
        rel="stylesheet" />
    <!-- Material Symbols -->
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <!-- Tailwind Config -->
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#277bf1",
                        "background-light": "#f6f7f8",
                        "background-dark": "#101722",
                    },
                    fontFamily: {
                        "display": ["Plus Jakarta Sans", "sans-serif"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
    <style>
        /* Custom scrollbar for cleaner look */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        .dark ::-webkit-scrollbar-thumb {
            background: #334155;
        }
    </style>
</head>

<body
    class="bg-background-light dark:bg-background-dark text-slate-900 dark:text-white font-display min-h-screen flex flex-col antialiased selection:bg-primary/30 selection:text-primary">
    <!-- Navigation -->
    <header class="sticky top-0 z-50 bg-white/80 dark:bg-slate-900/80 backdrop-blur-md border-b border-slate-200 dark:border-slate-800">
        <div class="px-4 md:px-10 py-3 flex items-center justify-between whitespace-nowrap">
            <div class="flex items-center gap-8">
                <a class="flex items-center gap-3 group" href="../cars.php">
                    <h2 class="text-slate-900 dark:text-white text-xl font-bold tracking-tight">MaBagnole</h2>
                </a>
                <nav class="hidden md:flex items-center gap-6">
                    <a class="text-slate-600 dark:text-slate-300 hover:text-primary dark:hover:text-primary text-sm font-medium transition-colors" href="../cars.php">Fleet</a>
                    <a class="text-slate-600 dark:text-slate-300 hover:text-primary dark:hover:text-primary text-sm font-medium transition-colors" href="../dashboard.php">My Bookings</a>
                    <!-- Community Dropdown -->
                    <div class="relative group">
                        <button class="flex items-center gap-2 text-slate-600 dark:text-slate-300 hover:text-primary dark:hover:text-primary text-sm font-medium transition-colors">
                            Community
                            <span class="material-symbols-outlined text-[18px] group-hover:rotate-180 transition-transform duration-200">expand_more</span>
                        </button>
                        <!-- Dropdown Menu -->
                        <div class="absolute left-0 mt-1 w-48 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 py-2 z-50">
                            <a href="ArticlesList.php" class="block px-4 py-2 text-sm text-slate-700 dark:text-slate-300 hover:bg-primary/10 hover:text-primary dark:hover:bg-primary/20 transition-colors">
                                <span class="material-symbols-outlined text-[18px] inline mr-2 align-middle">article</span>
                                Blog Articles
                            </a>
                            <a href="theme.php" class="block px-4 py-2 text-sm text-slate-700 dark:text-slate-300 hover:bg-primary/10 hover:text-primary dark:hover:bg-primary/20 transition-colors">
                                <span class="material-symbols-outlined text-[18px] inline mr-2 align-middle">palette</span>
                                Themes
                            </a>
                            <a href="favoris.php" class="block px-4 py-2 text-sm text-slate-700 dark:text-slate-300 hover:bg-primary/10 hover:text-primary dark:hover:bg-primary/20 transition-colors">
                                <span class="material-symbols-outlined text-[18px] inline mr-2 align-middle">favorite</span>
                                Favorites
                            </a>
                            <hr class="border-slate-200 dark:border-slate-700 my-1">
                            <a href="ArticlesList.php#comments" class="block px-4 py-2 text-sm text-slate-700 dark:text-slate-300 hover:bg-primary/10 hover:text-primary dark:hover:bg-primary/20 transition-colors">
                                <span class="material-symbols-outlined text-[18px] inline mr-2 align-middle">chat_bubble</span>
                                Comments
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="flex items-center gap-4">
                <div class="flex items-center gap-3">
                    <div class="hidden sm:flex flex-col items-end">
                        <span class="text-sm font-bold text-slate-900 dark:text-white"><?= $logged->nom ?></span>
                        <span class="text-xs text-slate-500 dark:text-slate-400"><?= $logged->email ?></span>
                    </div>
                    <div class="size-10 rounded-full bg-gradient-to-br from-primary to-blue-600 flex items-center justify-center text-white font-bold">
                        <?= $logged->nom[0] ?>
                    </div>
                </div>
                <a href="../../auth/login.php" class="flex items-center gap-2 px-4 py-2 rounded-lg text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">
                    <span class="material-symbols-outlined text-[20px]">logout</span>
                    <span class="hidden sm:inline text-sm font-medium">Logout</span>
                </a>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-1 w-full">
        <!-- HeroSection -->
        <section class="relative w-full py-8 md:py-12">
            <div class="container mx-auto px-4">
                <div class="relative overflow-hidden rounded-2xl bg-slate-900 min-h-[400px] flex flex-col items-center justify-center p-8 text-center"
                    data-alt="Dark blurred background of a car driving on a coastal road"
                    style='background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.7)), url("https://lh3.googleusercontent.com/aida-public/AB6AXuDiw1-1QIUmk1XBID2_RjVi0i3r_KQRCdNOJCZU-AsocLbqPKCttoE_0kNxAu-ryEFhzcKWs6KvgtSuOaJ0ZuII_BKNWd87p6QVilf30gqx8m5ffP3JYJ05vJIGCriyLkGHeIB6wBP7rqgJ7d03sb-YZybmf4Tt-QK3XUw72iqAQA6HzVY4CPJbVxtUIgDFBQtn6SBIEjRLfePnovttZbRZ9I-E7hRjwtHgfg0hSeHzyK_GlGyYMFGotAeWtgQN-xftJetbAOii02Q"); background-size: cover; background-position: center;'>
                    <div class="max-w-3xl flex flex-col items-center gap-6 animate-fade-in-up">
                        <div class="flex flex-col gap-3">
                            <span
                                class="inline-block px-3 py-1 rounded-full bg-white/10 backdrop-blur-sm border border-white/20 text-white text-xs font-bold uppercase tracking-wider mb-2 w-fit mx-auto">
                                Community Hub
                            </span>
                            <h1
                                class="text-white text-4xl md:text-5xl lg:text-6xl font-black leading-tight tracking-tight">
                                Welcome to the MaBagnole Community
                            </h1>
                            <p class="text-slate-200 text-lg md:text-xl font-medium max-w-2xl mx-auto leading-relaxed">
                                Discover expert tips, share your epic road trip stories, and connect with fellow drivers
                                worldwide.
                            </p>
                        </div>
                        <!-- Search Bar -->
                        <div class="w-full max-w-xl mt-4">
                            <div class="relative group">
                                <div
                                    class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-primary transition-colors">
                                    <span class="material-symbols-outlined">search</span>
                                </div>
                                <input
                                    class="w-full h-14 pl-11 pr-32 rounded-xl border-0 bg-white shadow-lg focus:ring-2 focus:ring-primary text-slate-900 placeholder:text-slate-400 text-base font-medium transition-all"
                                    placeholder="Search for tips, routes, or reviews..." type="text" />
                                <button
                                    class="absolute right-2 top-2 bottom-2 bg-primary hover:bg-blue-600 text-white font-bold rounded-lg px-6 text-sm transition-colors">
                                    Search
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Themes Section -->
        <section class="py-12">
            <div class="container mx-auto px-4 max-w-6xl">
                <div class="flex items-center justify-between mb-8">
                    <h2 class="text-2xl md:text-3xl font-bold text-slate-900 dark:text-white flex items-center gap-2">
                        Browse by Theme
                    </h2>
                    <a class="text-sm font-bold text-primary hover:text-blue-600 flex items-center gap-1" href="#">
                        View All <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                    </a>
                </div>
                <?php if (!empty($themes)): ?>
                    <div id="themes" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                        <?php foreach ($themes as $theme): ?>
                            <a class="group flex flex-col h-full bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 overflow-hidden hover:shadow-xl hover:shadow-slate-200/50 dark:hover:shadow-black/30 hover:border-primary/50 dark:hover:border-primary/50 transition-all duration-300"
                                href="./ArticlesList.php?id_theme=<?= $theme->id_theme ?>">
                                <div class="h-32 bg-slate-200 bg-cover bg-center relative"
                                    data-alt="Scenic winding mountain road with autumn trees"
                                    style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCR1pW3vHaRCSsUWktx4KYdZ4JVrqU6beeiiN3KfgvrMM543NDUoielVaDbmJ37WykHRTmS86Y3a8PN04oEM2mMFGTEHt8Su9XZ3iyZRkRh6D7vTfgp3RrCzZkIe8URaLPJCVNvDO_NRLgtHXz-b8tQPnDR7Miwf3g48sU6vHmriPdxVkm7j6LmSw9LYlYxVt5MoDN_pTVgm-xRg3huFYcAtGTf8jHTS2Ja5g87MASRce5fdFcq81aLoEQVJfspji3xTz1se366IKs");'>
                                    <div class="absolute inset-0 bg-black/20 group-hover:bg-black/10 transition-colors"></div>
                                </div>
                                <div class="p-5 flex flex-col flex-1">

                                    <h3
                                        class="text-lg font-bold text-slate-900 dark:text-white mb-1 group-hover:text-primary transition-colors">
                                        <?= $theme->titre ?></h3>
                                    <div
                                        class="mt-auto pt-4 border-t border-slate-100 dark:border-slate-700 flex justify-between items-center">
                                        <span class="text-xs font-semibold text-slate-400"><?= isset($theme->articles) ? $theme->articles : '0' ?> Articles</span>
                                        <span
                                            class="material-symbols-outlined text-slate-300 group-hover:translate-x-1 transition-transform text-[18px]">arrow_forward</span>
                                    </div>
                                </div>
                            </a>
                        <?php endforeach; ?>

                    </div>
                <?php else: ?>
                    <div class="flex flex-col items-center justify-center py-16 px-4">
                        <div class="max-w-md text-center">
                            <div class="mb-6 flex justify-center">
                                <div class="w-24 h-24 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center">
                                    <span class="material-symbols-outlined text-slate-400 dark:text-slate-500" style="font-size: 48px;">palette</span>
                                </div>
                            </div>
                            <h3 class="text-2xl font-bold text-slate-900 dark:text-white mb-3">
                                No Themes Yet
                            </h3>
                            <p class="text-slate-600 dark:text-slate-400 mb-6 leading-relaxed">
                                We're working on adding exciting themes for our community. Check back soon to discover new topics and join the conversation!
                            </p>

                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </section>

    </main>
    <!-- Footer -->
    <footer class="bg-white dark:bg-[#101722] border-t border-slate-200 dark:border-slate-800 pt-16 pb-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mb-12">
                <div class="col-span-2 md:col-span-1 flex flex-col gap-4">
                    <div class="flex items-center gap-2 text-slate-900 dark:text-white">
                        <div class="w-6 h-6 rounded bg-primary flex items-center justify-center text-white">
                            <span class="material-symbols-outlined text-[16px]">directions_car</span>
                        </div>
                        <span class="font-bold text-lg">MaBagnole</span>
                    </div>
                    <p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed">
                        Connecting drivers with the perfect ride and a community of passionate travelers.
                    </p>
                </div>
                <div>
                    <h4 class="font-bold text-slate-900 dark:text-white mb-4">Company</h4>
                    <ul class="flex flex-col gap-2 text-sm text-slate-500 dark:text-slate-400">
                        <li><a class="hover:text-primary transition-colors" href="#">About Us</a></li>
                        <li><a class="hover:text-primary transition-colors" href="#">Careers</a></li>
                        <li><a class="hover:text-primary transition-colors" href="#">Press</a></li>
                        <li><a class="hover:text-primary transition-colors" href="#">Blog</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-slate-900 dark:text-white mb-4">Community</h4>
                    <ul class="flex flex-col gap-2 text-sm text-slate-500 dark:text-slate-400">
                        <li><a class="hover:text-primary transition-colors" href="#">Guidelines</a></li>
                        <li><a class="hover:text-primary transition-colors" href="#">Discussions</a></li>
                        <li><a class="hover:text-primary transition-colors" href="#">Events</a></li>
                        <li><a class="hover:text-primary transition-colors" href="#">Become an Author</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-slate-900 dark:text-white mb-4">Support</h4>
                    <ul class="flex flex-col gap-2 text-sm text-slate-500 dark:text-slate-400">
                        <li><a class="hover:text-primary transition-colors" href="#">Help Center</a></li>
                        <li><a class="hover:text-primary transition-colors" href="#">Safety</a></li>
                        <li><a class="hover:text-primary transition-colors" href="#">Cancellation Options</a></li>
                    </ul>
                </div>
            </div>
            <div
                class="border-t border-slate-100 dark:border-slate-800 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-xs text-slate-400">© 2023 MaBagnole Inc. All rights reserved.</p>
                <div class="flex gap-4">
                    <a class="text-slate-400 hover:text-primary transition-colors" href="#">
                        <span class="sr-only">Facebook</span>
                        <svg class="h-5 w-5" fill="currentColor" viewbox="0 0 24 24">
                            <path
                                d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z">
                            </path>
                        </svg>
                    </a>
                    <a class="text-slate-400 hover:text-primary transition-colors" href="#">
                        <span class="sr-only">Twitter</span>
                        <svg class="h-5 w-5" fill="currentColor" viewbox="0 0 24 24">
                            <path
                                d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84">
                            </path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </footer>
    <script>
        
    </script>
</body>

</html>