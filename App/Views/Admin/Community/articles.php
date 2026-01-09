<?php
session_start();

if (!isset($_SESSION['logged']) || $_SESSION['logged']->role !== 'admin') {
    header('Location: ./../../auth/login.php');
    exit();
}

require_once './../../../../vendor/autoload.php';

use App\Classes\Article;

$articles = Article::getAllArticles();

?>

<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Article Management - MaBagnole Admin</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200;300;400;500;600;700;800&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#277bf1",
                        "background-light": "#f6f7f8",
                        "background-dark": "#101722",
                        "surface-light": "#ffffff",
                        "surface-dark": "#1e293b",
                        "border-light": "#e2e8f0",
                        "border-dark": "#334155",
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
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        .material-symbols-outlined.fill {
            font-variation-settings: 'FILL' 1, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        /* Hide scrollbar for Chrome, Safari and Opera */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        /* Hide scrollbar for IE, Edge and Firefox */
        .no-scrollbar {
            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
            /* Firefox */
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100 font-display transition-colors duration-200 overflow-hidden">
    <div class="flex h-screen w-full">
        <aside class="w-64 bg-white dark:bg-slate-900 border-r border-slate-200 dark:border-slate-800 flex-col hidden lg:flex h-full z-10 relative">
            <div class="p-6 border-b border-slate-200 dark:border-slate-800">
                <div class="flex gap-3 items-center">
                    <div class="bg-center bg-no-repeat bg-cover rounded-full size-10 border border-slate-200 dark:border-slate-700" data-alt="User profile picture showing a smiling man" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCC3MqzxP3uuCVk6C4sk4fTJsCxAatwAedQrnFNEE81XukbhdewT1yiGX4mS4WCnkXevgNeM-02I1X66JUz42TMMcQ68dq_nAP77phDxymeLjN1tRlGVXQO2efmhDZcD8uZffnh8cN5wZEG7zwql5gr_Bg4IfGiJNwT8KjwJPHUwD-skAppLlzm5TWeD-fG_QWO70n3ryJtDcXk0NAZuahQ7YMC4mEynIfrX5waaxKjWI5n9Rf2p3oBw16vLBEZEwl4jp9SC0DRv5g");'></div>
                    <div class="flex flex-col">
                        <h1 class="text-slate-900 dark:text-white text-base font-bold leading-normal">MaBagnole Admin</h1>
                        <p class="text-primary text-sm font-medium leading-normal">Administrator</p>
                    </div>
                </div>
            </div>
            <nav class="flex-1 overflow-y-auto p-4 flex flex-col gap-2">
                <a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors group" href="../dashboard.php">
                    <span class="material-symbols-outlined text-slate-500 dark:text-slate-400 group-hover:text-primary">dashboard</span>
                    <span class="text-sm font-medium">Dashboard</span>
                </a>
                <a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors group" href="../car.php">
                    <span class="material-symbols-outlined text-slate-500 dark:text-slate-400 group-hover:text-primary">directions_car</span>
                    <span class="text-sm font-medium">Vehicles</span>
                </a>
                <div class="flex flex-col gap-1">
                    <a class="flex items-center gap-3 px-3 py-2.5 rounded-lg bg-primary/10 text-primary dark:bg-primary/20 dark:text-primary-400 transition-colors group" href="./dashboard.php">
                        <span class="material-symbols-outlined text-[20px] fill-1">menu_book</span>
                        <span class="text-sm font-bold">Blog</span>
                    </a>
                    <!-- Submenu -->
                    <div class="ml-9 flex flex-col border-l border-slate-200 dark:border-slate-700 pl-3 gap-1">
                        <a class="px-3 py-1.5 text-sm font-bold text-primary dark:text-blue-400" href="./articles.php">Articles</a>
                        <a class="px-3 py-1.5 text-sm font-medium text-slate-500 dark:text-slate-400 hover:text-primary dark:hover:text-blue-400" href="./tags.php">Tags</a>
                        <a class="px-3 py-1.5 text-sm font-medium text-slate-500 dark:text-slate-400 hover:text-primary dark:hover:text-blue-400" href="./theme.php">Themes</a>
                        <a class="px-3 py-1.5 text-sm font-medium text-slate-500 dark:text-slate-400 hover:text-primary dark:hover:text-blue-400" href="./Comments.php">Commentaires</a>
                    </div>
                </div>
                <a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors group" href="../category.php">
                    <span class="material-symbols-outlined text-slate-500 dark:text-slate-400 group-hover:text-primary">category</span>
                    <span class="text-sm font-medium">Categories</span>
                </a>
                <a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors group" href="../reservations.php">
                    <span class="material-symbols-outlined text-slate-500 dark:text-slate-400 group-hover:text-primary">calendar_today</span>
                    <span class="text-sm font-medium">Reservations</span>
                </a>
                <a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors group" href="#">
                    <span class="material-symbols-outlined text-slate-500 dark:text-slate-400 group-hover:text-primary">star</span>
                    <span class="text-sm font-medium">Reviews</span>
                </a>
                <a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors group mt-auto" href="./../../../Controllers/AuthController.php?action=logout">
                    <span class="material-symbols-outlined text-slate-500 dark:text-slate-400 group-hover:text-red-500">logout</span>
                    <span class="text-sm font-medium group-hover:text-red-500">Log Out</span>
                </a>
            </nav>
        </aside>
        <!-- Main Content -->
        <main class="flex-1 h-full overflow-y-auto overflow-x-hidden flex flex-col bg-background-light dark:bg-background-dark">
            <div class="max-w-[1440px] mx-auto w-full p-6 md:p-8 flex flex-col gap-8">
                <!-- Page Header -->
                <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
                    <div class="flex flex-col gap-2">
                        <h1 class="text-slate-900 dark:text-white text-3xl md:text-4xl font-black leading-tight tracking-tight">Article Management</h1>
                        <p class="text-slate-500 dark:text-slate-400 text-base font-normal">Manage, review, and publish blog content for MaBagnole.</p>
                    </div>
                    <button class="flex items-center gap-2 bg-primary hover:bg-blue-600 text-white px-5 py-2.5 rounded-lg font-bold shadow-sm shadow-blue-500/20 transition-all active:scale-95">
                        <span class="material-symbols-outlined text-xl">add</span>
                        Create New Article
                    </button>
                </div>
                <!-- Filters & Search Toolbar -->
                <div class="bg-surface-light dark:bg-surface-dark p-4 rounded-xl border border-border-light dark:border-border-dark flex flex-col gap-4">
                    <div class="flex flex-col lg:flex-row gap-4 items-center justify-between">
                        <!-- Search -->
                        <div class="relative w-full lg:max-w-md">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="material-symbols-outlined text-slate-400">search</span>
                            </div>
                            <input class="block w-full pl-10 pr-3 py-2.5 border-none rounded-lg bg-background-light dark:bg-slate-800 text-slate-900 dark:text-white placeholder-slate-400 focus:ring-2 focus:ring-primary sm:text-sm" placeholder="Search by title, author, or ID..." type="text" />
                        </div>
                        <!-- Filters -->
                        <div class="flex items-center gap-2 overflow-x-auto w-full lg:w-auto pb-2 lg:pb-0 no-scrollbar">
                            <button class="whitespace-nowrap flex items-center gap-2 px-3 py-2 rounded-lg bg-background-light dark:bg-slate-800 border border-transparent hover:border-slate-300 dark:hover:border-slate-600 transition-all text-sm font-medium text-slate-700 dark:text-slate-300">
                                Status: All
                                <span class="material-symbols-outlined text-lg">expand_more</span>
                            </button>
                            <button class="whitespace-nowrap flex items-center gap-2 px-3 py-2 rounded-lg bg-background-light dark:bg-slate-800 border border-transparent hover:border-slate-300 dark:hover:border-slate-600 transition-all text-sm font-medium text-slate-700 dark:text-slate-300">
                                Category: All
                                <span class="material-symbols-outlined text-lg">expand_more</span>
                            </button>
                            <button class="whitespace-nowrap flex items-center gap-2 px-3 py-2 rounded-lg bg-background-light dark:bg-slate-800 border border-transparent hover:border-slate-300 dark:hover:border-slate-600 transition-all text-sm font-medium text-slate-700 dark:text-slate-300">
                                Date: Last 30 Days
                                <span class="material-symbols-outlined text-lg">expand_more</span>
                            </button>
                            <button class="whitespace-nowrap flex items-center gap-2 px-3 py-2 rounded-lg text-slate-500 hover:text-primary transition-colors text-sm font-medium">
                                <span class="material-symbols-outlined text-lg">filter_list</span>
                                More Filters
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Articles Table -->
                <div class="bg-surface-light dark:bg-surface-dark border border-border-light dark:border-border-dark rounded-xl overflow-hidden shadow-sm flex flex-col">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-slate-50 dark:bg-slate-800/50 border-b border-border-light dark:border-border-dark text-xs uppercase text-slate-500 dark:text-slate-400 font-semibold tracking-wider">
                                    <th class="p-4 w-12">
                                        <input class="rounded border-slate-300 text-primary focus:ring-primary h-4 w-4 bg-transparent" type="checkbox" />
                                    </th>
                                    <th class="p-4 min-w-[300px]">Article Details</th>
                                    <th class="p-4">Author</th>
                                    <th class="p-4">Theme</th>
                                    <th class="p-4">Date</th>
                                    <th class="p-4">Status</th>
                                    <th class="p-4 text-right">Actions</th>
                                </tr>
                            </thead>
                            <?php if (isset($articles) && !empty($articles)): ?>
                                <tbody class="divide-y divide-border-light dark:divide-border-dark text-sm">
                                    <?php foreach ($articles as $article): ?>
                                        <!-- Row 1 -->
                                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors group">

                                            <td class="p-4">
                                                <div class="flex gap-4">
                                                    <div class="h-16 w-24 shrink-0 overflow-hidden rounded-lg bg-slate-200">
                                                        <img class="h-full w-full object-cover" data-alt="Scenic road trip view through a desert landscape" src="<?= $article->image ?> ?>" />
                                                    </div>
                                                    <div class="flex flex-col gap-1">
                                                        <p class="font-bold text-slate-900 dark:text-white line-clamp-1 group-hover:text-primary transition-colors"><?= $article->titre ?></p>
                                                        <p class="text-slate-500 line-clamp-2 text-xs"><?= $article->texte ?></p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="p-4 align-top pt-5">
                                                <div class="flex items-center gap-2">
                                                    <span class="text-slate-700 dark:text-slate-300 font-medium"><?= $article->author ?></span>
                                                </div>
                                            </td>
                                            <td class="p-4 align-top pt-5">
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-300">
                                                    Travel Tips
                                                </span>
                                            </td>
                                            <td class="p-4 align-top pt-5 text-slate-500"><?= date('m, d Y', strtotime($article->created_at)) ?></td>
                                            <td class="p-4 align-top pt-5">
                                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700 dark:bg-green-500/10 dark:text-green-400 border border-green-200 dark:border-green-500/20">
                                                    <span class="h-1.5 w-1.5 rounded-full bg-green-500"></span>
                                                    <?= $article->status ?>
                                                </span>
                                            </td>
                                            <td class="p-4 align-top pt-4 text-right">
                                                <div class="flex items-center justify-end gap-1">
                                                    <a href="./../../../Controllers/ArticleController.php?action=accept&id=<?= $article->id_article ?>" class="p-2 text-slate-400 hover:text-primary hover:bg-primary/10 rounded-lg transition-colors" title="Edit">
                                                        <span class="material-symbols-outlined text-xl">accept</span>
                                                    </a>

                                                    <a href="./../../../Controllers/ArticleController.php?action=reject&id=<?= $article->id_article ?>" class="p-2 text-slate-400 hover:text-slate-900 dark:hover:text-white hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg transition-colors">
                                                        <span class="material-symbols-outlined text-xl">refuse</span>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            <?php else: ?>
                                <tbody>
                                    <tr>
                                        <td colspan="7" class="p-8 text-center">
                                            <div class="flex flex-col items-center justify-center gap-3">
                                                <span class="material-symbols-outlined text-5xl text-slate-300 dark:text-slate-600">article</span>
                                                <div>
                                                    <p class="font-semibold text-slate-600 dark:text-slate-400">No articles found</p>
                                                    <p class="text-sm text-slate-500 dark:text-slate-500">Create your first article to get started</p>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            <?php endif; ?>
                        </table>
                    </div>
                    <!-- Pagination -->
                    <div class="bg-surface-light dark:bg-surface-dark px-6 py-4 border-t border-border-light dark:border-border-dark flex items-center justify-between">
                        <p class="text-sm text-slate-500 dark:text-slate-400 hidden sm:block">
                            Showing <span class="font-medium text-slate-900 dark:text-white">1</span> to <span class="font-medium text-slate-900 dark:text-white">10</span> of <span class="font-medium text-slate-900 dark:text-white">145</span> results
                        </p>
                        <div class="flex items-center gap-1 w-full sm:w-auto justify-center">
                            <button class="p-2 rounded-lg text-slate-500 hover:bg-slate-100 dark:hover:bg-slate-700 disabled:opacity-50 disabled:cursor-not-allowed">
                                <span class="material-symbols-outlined text-xl">chevron_left</span>
                            </button>
                            <button class="h-9 w-9 flex items-center justify-center rounded-lg bg-primary text-white text-sm font-bold shadow-sm shadow-blue-500/20">1</button>
                            <button class="h-9 w-9 flex items-center justify-center rounded-lg text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 text-sm font-medium transition-colors">2</button>
                            <button class="h-9 w-9 flex items-center justify-center rounded-lg text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 text-sm font-medium transition-colors">3</button>
                            <span class="px-2 text-slate-400">...</span>
                            <button class="h-9 w-9 flex items-center justify-center rounded-lg text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 text-sm font-medium transition-colors">15</button>
                            <button class="p-2 rounded-lg text-slate-500 hover:bg-slate-100 dark:hover:bg-slate-700">
                                <span class="material-symbols-outlined text-xl">chevron_right</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>