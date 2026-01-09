<?php

use App\Classes\Comment;
use App\Classes\Tag;

session_start();
require_once './../../../../vendor/autoload.php';
$tags = Tag::getAllTags();
?>

<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>MaBagnole - Tag Management</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet" />
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
        /* Custom scrollbar for better aesthetics in admin panels */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
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

        .dark ::-webkit-scrollbar-thumb:hover {
            background: #475569;
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark font-display text-slate-900 dark:text-white antialiased overflow-hidden">
    <div class="flex h-screen w-full">
        <aside class="hidden w-64 flex-col border-r border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 md:flex">
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
                    <div class="ml-9 flex flex-col border-l border-slate-200 dark:border-slate-700 pl-3 gap-1">
                        <a class="px-3 py-1.5 text-sm font-medium text-slate-500 dark:text-slate-400 hover:text-primary dark:hover:text-blue-400" href="./articles.php">Articles</a>
                        <a class="px-3 py-1.5 text-sm font-bold text-primary dark:text-blue-400" href="./tags.php">Tags</a>
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
        <main class="flex flex-1 flex-col h-full overflow-hidden relative">

            <div class="flex-1 overflow-y-auto p-4 md:p-8 scroll-smooth">
                <div class="max-w-7xl mx-auto flex flex-col gap-8">
                    <!-- Breadcrumbs -->
                    <nav class="flex items-center text-sm font-medium text-slate-500 dark:text-slate-400">
                        <a class="hover:text-primary transition-colors" href="#">Dashboard</a>
                        <span class="mx-2 text-slate-300 dark:text-slate-600">/</span>
                        <a class="hover:text-primary transition-colors" href="#">Blog</a>
                        <span class="mx-2 text-slate-300 dark:text-slate-600">/</span>
                        <span class="text-slate-900 dark:text-white">Tags</span>
                    </nav>
                    <!-- Page Heading & Actions -->
                    <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-4">
                        <div class="flex flex-col gap-1">
                            <h2 class="text-3xl md:text-4xl font-extrabold tracking-tight text-slate-900 dark:text-white">Tag Management</h2>
                            <p class="text-slate-500 dark:text-slate-400 text-base">Organize your blog content by managing the taxonomy tags.</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
                        <!-- Left Column: Tag List (Takes up 2/3 on large screens) -->
                        <div class="lg:col-span-2 flex flex-col gap-4">

                            <div class="bg-white dark:bg-slate-800 rounded-b-xl shadow-sm border border-slate-200 dark:border-slate-700 overflow-hidden -mt-4">
                                <div class="overflow-x-auto">
                                    <table class="w-full text-left text-sm text-slate-600 dark:text-slate-400">
                                        <thead class="bg-slate-50 dark:bg-slate-900/50 text-xs uppercase font-semibold text-slate-500 dark:text-slate-400">
                                            <tr>
                                                <th class="px-6 py-4">Tag Name</th>
                                                <th class="px-6 py-4 text-center">Posts</th>
                                                <th class="px-6 py-4 text-right">Actions</th>
                                            </tr>
                                        </thead>
                                        <?php if (empty($tags)): ?>
                                            <tbody>
                                                <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/30 transition-colors">
                                                    <td colspan="5" class="px-6 py-16 text-center">
                                                        <div class="flex flex-col items-center justify-center gap-4">
                                                            <div class="bg-slate-100 dark:bg-slate-800 rounded-full p-4">
                                                                <span class="material-symbols-outlined text-slate-400 dark:text-slate-500 text-[40px]">tag</span>
                                                            </div>
                                                            <div class="flex flex-col gap-2">
                                                                <h3 class="text-slate-900 dark:text-white font-semibold">No Tags yet!</h3>
                                                                <p class="text-slate-500 dark:text-slate-400 text-sm">There are no tags to moderate at this time.</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        <?php else: ?>
                                            <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
                                                <?php foreach ($tags as $tag) : ?>
                                                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-colors group">
                                                        <td id="toUpdate" class="px-6 py-4">
                                                            <div class="font-medium text-slate-900 dark:text-white"><?= $tag->titre ?></div>
                                                        </td>
                                                        <td class="px-6 py-4 text-center">
                                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900/50 dark:text-blue-300">
                                                                <?= $tag->posts ?>
                                                            </span>
                                                        </td>
                                                        <td class="px-6 py-4 text-right">
                                                            <div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                                                <button
                                                                    onclick="updateTag(<?= $tag->id_tag ?>,'<?= $tag->titre ?>')"
                                                                    class="text-slate-400 hover:text-primary transition-colors" title="Edit">
                                                                    <span class="material-symbols-outlined text-[18px]">edit</span>
                                                                </button>
                                                                <a href="./../../../Controllers/TagController.php?id=<?= $tag->id_tag ?>&action=delete" class="text-slate-400 hover:text-red-500 transition-colors" title="Delete">
                                                                    <span class="material-symbols-outlined text-[18px]">delete</span>
                                                                </a>
                                                            </div>
                                                        </td>
                                                        <script>
                                                            let toUpdate = document.getElementById('toUpdate');

                                                            function updateTag(id, titre) {
                                                                let tmp = document.createElement('div');
                                                                tmp.className = 'w-full';
                                                                tmp.innerHTML = `
                                                                    <form action="./../../../Controllers/TagController.php?action=update"
                                                                        method="POST"
                                                                        class="flex items-center gap-2 w-full">
                                                                        <input name="titre"
                                                                            value="${titre}"
                                                                            type="text"
                                                                            class="flex-1 outline-none border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-900 px-3 py-2 text-sm rounded-lg text-slate-900 dark:text-white focus:ring-2 focus:ring-primary focus:border-transparent transition-all">
                                                                        <input name="id" type="hidden" value="${id}">

                                                                        <button type="submit"
                                                                                class="flex items-center justify-center px-3 py-2 bg-primary hover:bg-blue-600 text-white rounded-lg transition-colors shadow-sm hover:shadow-md">
                                                                            <span class="material-symbols-outlined text-[18px]">check</span>
                                                                        </button>
                                                                    </form>

                                                                `;
                                                                toUpdate.innerHTML = '';
                                                                toUpdate.appendChild(tmp);
                                                            }
                                                        </script>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        <?php endif; ?>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <!-- Right Column: Quick Add (Takes up 1/3) -->
                        <div class="lg:col-span-1">
                            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-slate-200 dark:border-slate-700 sticky top-8">
                                <div class="p-6 border-b border-slate-200 dark:border-slate-700">
                                    <h3 class="text-lg font-bold text-slate-900 dark:text-white">Quick Add</h3>
                                    <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Add new tags to the system.</p>
                                </div>
                                <div class="p-6 flex flex-col gap-6">

                                    <form action="./../../../Controllers/TagController.php?action=add" method="POST" class="flex flex-col gap-4">
                                        <div class="flex flex-col gap-2">
                                            <label class="text-sm font-semibold text-slate-700 dark:text-slate-200">Tag Name</label>
                                            <input name="titre" class="rounded-lg border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-900 text-sm focus:ring-primary focus:border-primary" placeholder="e.g. Vintage Cars" type="text" />
                                        </div>
                                        <button class="w-full py-2.5 bg-primary hover:bg-blue-600 text-white font-semibold rounded-lg shadow-md shadow-blue-500/20 transition-all flex justify-center items-center gap-2">
                                            <span class="material-symbols-outlined text-[18px]">add</span>
                                            Add Tag
                                        </button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>