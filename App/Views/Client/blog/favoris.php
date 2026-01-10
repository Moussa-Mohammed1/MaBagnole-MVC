<?php

use App\Classes\Favoris;

require_once './../../../../vendor/autoload.php';

session_start();
$logged = $_SESSION['logged'];
$articles = Favoris::getFavoris($logged->id_user);
?>
<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>My Favorite Articles - MaBagnole</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;700;800&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
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
                        "DEFAULT": "0.375rem", // rounded-md is approx 6px
                        "md": "0.375rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
</head>

<body class="bg-background-light dark:bg-background-dark text-slate-900 dark:text-white font-display min-h-screen flex flex-col">
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
                            <a href="theme.php" class="block px-4 py-2 text-sm text-slate-700 dark:text-slate-300 hover:bg-primary/10 hover:text-primary dark:hover:bg-primary/20 transition-colors">
                                <span class="material-symbols-outlined text-[18px] inline mr-2 align-middle">palette</span>
                                Themes
                            </a>
                            <a href="favoris.php" class="block px-4 py-2 text-sm text-slate-700 dark:text-slate-300 hover:bg-primary/10 hover:text-primary dark:hover:bg-primary/20 transition-colors">
                                <span class="material-symbols-outlined text-[18px] inline mr-2 align-middle">favorite</span>
                                Favorites
                            </a>
                            <hr class="border-slate-200 dark:border-slate-700 my-1">
                            <a href="ArticlesList.php" class="block px-4 py-2 text-sm text-slate-700 dark:text-slate-300 hover:bg-primary/10 hover:text-primary dark:hover:bg-primary/20 transition-colors">
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
    <main class="flex-grow w-full max-w-[1120px] mx-auto px-4 md:px-10 py-8">
        <!-- Page Heading -->
        <div class="mb-8">
            <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 dark:text-white tracking-tight mb-2">My Saved Articles</h1>
            <p class="text-slate-500 dark:text-slate-400">You have <?= count($articles) ?> saved article<?= count($articles) !== 1 ? 's' : '' ?> in your library.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
            <?php if (!empty($articles)): ?>
                <?php foreach ($articles as $article): ?>
                    <article class="group bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-slate-100 dark:border-slate-700 overflow-hidden flex flex-col hover:-translate-y-1 hover:shadow-md transition-all duration-300">
                        <div class="relative h-48 overflow-hidden">
                            <div class="absolute top-3 right-3 z-10">
                                <a href="./../../../Controllers/favorisController.php?action=delete&id_article=<?= $article->id_article ?>&id_client=<?= $logged->id_user ?>" class="bg-white/90 dark:bg-slate-900/90 p-2 rounded-full shadow-sm text-primary hover:bg-red-50 hover:text-red-500 transition-colors" title="Remove from favorites">
                                    <span class="material-symbols-outlined text-[20px] font-variation-settings-'FILL'1 block">favorite</span>
                                </a>
                            </div>
                            <?php if (!empty($article->image)): ?>
                                <div class="w-full h-full bg-cover bg-center transition-transform duration-500 group-hover:scale-105" style='background-image: url("<?= htmlspecialchars($article->image) ?>");'></div>
                            <?php else: ?>
                                <div class="w-full h-full bg-slate-200 dark:bg-slate-700 flex items-center justify-center transition-transform duration-500 group-hover:scale-105">
                                    <span class="material-symbols-outlined text-slate-400 text-5xl">image</span>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="p-5 flex flex-col flex-grow">
                            <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-2 line-clamp-2 group-hover:text-primary transition-colors">
                                <?= $article->titre ?>
                            </h3>
                            <p class="text-slate-500 dark:text-slate-400 text-sm line-clamp-3 mb-4 flex-grow">
                                <?= $article->texte ?>
                            </p>
                            <div class="pt-4 border-t border-slate-100 dark:border-slate-700 flex items-center justify-between mt-auto">
                                <span class="text-xs text-slate-400 font-medium">Added
                                    <?php
                                    $timeAgo = '';
                                    if ($article->created_at) {
                                        $cDate = new DateTime($article->created_at);
                                        $now = new DateTime();
                                        $diff = $now->diff($cDate);
                                        if ($diff->y > 0) {
                                            $timeAgo = $diff->y . 'year ago';
                                        } elseif ($diff->m > 0) {
                                            $timeAgo = $diff->m . 'month ago';
                                        } elseif ($diff->d > 0) {
                                            $timeAgo = $diff->d . 'day ago';
                                        } else {
                                            $timeAgo = 'Today';
                                        }
                                        echo $timeAgo;
                                    } ?> ago</span>
                                <a href="./article.php?id_article=<?= $article->id_article ?>"
                                    class="text-sm font-bold text-primary hover:underline flex items-center gap-1">
                                    Read More <span class="material-symbols-outlined text-base">arrow_forward</span>
                                </a>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-span-full flex flex-col items-center justify-center py-20 px-4">
                    <div class="bg-gradient-to-br from-primary/10 to-primary/5 dark:from-primary/20 dark:to-primary/10 rounded-full p-8 mb-6">
                        <span class="material-symbols-outlined text-primary text-6xl block">favorite_border</span>
                    </div>
                    <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-3">No Favorites Yet</h2>
                    <p class="text-slate-500 dark:text-slate-400 text-center max-w-md mb-8">
                        Start building your collection of favorite articles. Browse our blog and save the stories that inspire you!
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="theme.php" class="flex items-center justify-center gap-2 px-6 py-3 rounded-lg border-2 border-slate-200 dark:border-slate-700 text-slate-700 dark:text-slate-200 font-bold text-sm hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors">
                            <span class="material-symbols-outlined text-[20px]">palette</span>
                            Explore Themes
                        </a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </main>
    <footer class="bg-white dark:bg-slate-900 border-t border-slate-200 dark:border-slate-800 py-10">
        <div class="max-w-[1440px] mx-auto px-4 md:px-10 flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="flex items-center gap-2 text-slate-900 dark:text-white">
                <span class="font-bold text-lg">MaBagnole</span>
            </div>
            <div class="text-sm text-slate-500 dark:text-slate-400">
                © 2024 MaBagnole. All rights reserved.
            </div>
            <div class="flex gap-6">
                <a class="text-slate-500 hover:text-primary transition-colors" href="#">Privacy Policy</a>
                <a class="text-slate-500 hover:text-primary transition-colors" href="#">Terms of Service</a>
                <a class="text-slate-500 hover:text-primary transition-colors" href="#">Contact Support</a>
            </div>
        </div>
    </footer>
</body>

</html>