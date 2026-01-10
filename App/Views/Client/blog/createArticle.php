<?php
session_start();
require_once './../../../../vendor/autoload.php';


use App\Classes\Tag;

$logged = $_SESSION['logged'];

$id_theme = $_GET['id_theme'] ?? '';
if (empty($id_theme)) {
    header('Location: theme.php');
    exit();
}

?>

<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Add New Article - MaBagnole</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;700;800&amp;family=Noto+Sans:wght@400;500;700&amp;display=swap" rel="stylesheet" />
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
                        "display": ["Plus Jakarta Sans", "Noto Sans", "sans-serif"]
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
</head>

<body class="bg-background-light dark:bg-background-dark font-display text-slate-900 dark:text-white antialiased">
    <div class="relative flex min-h-screen w-full flex-col overflow-x-hidden">
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
        <div class="layout-container flex h-full grow flex-col">
            <div class="px-4 md:px-10 lg:px-40 flex flex-1 justify-center py-8">
                <div class="layout-content-container flex flex-col max-w-[960px] flex-1 w-full gap-6">
                    <!-- Breadcrumbs -->
                    <div class="flex flex-wrap gap-2 px-4">
                        <a class="text-slate-500 dark:text-slate-400 text-sm font-medium leading-normal hover:underline" href="../cars.php">Home</a>
                        <span class="text-slate-500 dark:text-slate-400 text-sm font-medium leading-normal">/</span>
                        <a class="text-slate-500 dark:text-slate-400 text-sm font-medium leading-normal hover:underline" href="ArticlesList.php">Blog</a>
                        <span class="text-slate-500 dark:text-slate-400 text-sm font-medium leading-normal">/</span>
                        <span class="text-slate-900 dark:text-white text-sm font-medium leading-normal">Write Article</span>
                    </div>
                    <!-- Page Heading -->
                    <div class="flex flex-wrap justify-between gap-3 px-4">
                        <div class="flex min-w-72 flex-col gap-2">
                            <h1 class="text-slate-900 dark:text-white text-4xl font-black leading-tight tracking-[-0.033em]">Create New Post</h1>
                            <p class="text-slate-500 dark:text-slate-400 text-base font-normal leading-normal">Share your road trip experiences with the MaBagnole community.</p>
                        </div>
                    </div>

                    <form action="./.././../../Controllers/ArticleController.php?action=add" method="POST"
                        class="flex flex-col gap-8 bg-white dark:bg-slate-900 rounded-xl shadow-sm border border-slate-200 dark:border-slate-800 p-6 md:p-10">

                        <div class="flex flex-col gap-2">
                            <label class="text-slate-900 dark:text-white text-sm font-bold leading-normal">Article Title</label>
                            <input name="titre" required class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-slate-900 dark:text-white focus:outline-0 focus:ring-2 focus:ring-primary/50 border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 h-14 placeholder:text-slate-400 px-4 text-xl font-semibold leading-normal" placeholder="Enter a catchy headline..." value="" />
                        </div>
                        <input type="hidden" name="id_theme" value="<?= $id_theme ?>">
                        <input type="hidden" name="id_client" value="<?= $logged->id_user ?>">
                        <div class="flex flex-col gap-2">
                            <label class="text-slate-900 dark:text-white text-sm font-bold leading-normal">Content</label>
                            <div class="border border-slate-200 dark:border-slate-700 rounded-lg overflow-hidden bg-white dark:bg-slate-900 flex flex-col min-h-[400px]">

                                <textarea name="texte" required class="w-full flex-1 p-4 text-base text-slate-700 dark:text-slate-300 bg-transparent resize-none outline-none leading-relaxed" placeholder="Start telling your story here..."></textarea>
                            </div>
                        </div>
                        <div class="flex flex-col gap-3">
                            <label class="text-slate-900 dark:text-white text-sm font-bold leading-normal">
                                <span class="flex items-center gap-2">
                                    <span class="material-symbols-outlined text-[18px]">label</span>
                                    Tags
                                </span>
                            </label>
                            <div class="flex flex-col gap-3">
                                <?php
                                $tags = Tag::getAllTags();
                                ?>
                                <select name="tag[]" multiple size="6" class="form-select [scrollbar-width:none] w-full rounded-lg border-2 border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 text-slate-900 dark:text-white px-4 py-3 text-sm font-medium focus:outline-0 focus:ring-2 focus:ring-primary/50 focus:border-primary transition-all hover:border-slate-300 dark:hover:border-slate-600 shadow-sm">
                                    <?php foreach ($tags as $tag): ?>
                                        <option value="<?= $tag->id_tag ?>" class="py-2 px-2 hover:bg-primary/10 cursor-pointer rounded"><?= $tag->titre ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="flex items-start gap-2 bg-slate-50 dark:bg-slate-800/50 p-3 rounded-lg border border-slate-200 dark:border-slate-700">
                                    <span class="material-symbols-outlined text-primary text-[18px] mt-0.5">info</span>
                                    <p class="text-slate-600 dark:text-slate-400 text-xs leading-relaxed">
                                        Hold <kbd class="px-1.5 py-0.5 bg-white dark:bg-slate-700 border border-slate-300 dark:border-slate-600 rounded text-xs font-mono">Ctrl</kbd> (or <kbd class="px-1.5 py-0.5 bg-white dark:bg-slate-700 border border-slate-300 dark:border-slate-600 rounded text-xs font-mono">Cmd</kbd> on Mac) while clicking to select multiple tags
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- Action Bar -->
                        <div class="pt-6 border-t border-slate-100 dark:border-slate-800 flex flex-col-reverse sm:flex-row justify-end gap-4">

                            <button type="submit" class="flex items-center justify-center gap-2 h-12 px-8 rounded-lg bg-primary text-white font-bold text-sm shadow-md hover:bg-blue-600 transition-colors">
                                <span class="material-symbols-outlined text-[20px]">send</span>
                                Submit Article
                            </button>
                        </div>
                    </form>
                    <div class="h-12"></div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>