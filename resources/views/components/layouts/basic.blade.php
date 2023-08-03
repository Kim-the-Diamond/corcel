<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Posts' }}</title>
    @vite('resources/css/app.css')
</head>
<body>
        <div class="flex flex-row justify-between m-10">

            <div class="flex gap-2">
                <img src="https://heco.in/wp-content/uploads/2021/08/cropped-heco-signet-200-67x67.png" alt="">
                <span class="self-center text-3xl font-bold ">heco Intranet</span>
            </div>
            <div class="flex flex-row items-center gap-3">
                <div><a href="/">Startseite</a></div>
                <div><a href="/wiki">Wiki</a></div>
                <div><a href="/acf">Acf</a></div>
                <div><a href="https://heco.in/wiki-themen/">Themen</a></div>
                <div><a href="https://zeit.heco.de/">Timecard</a></div>
                <div><a href="https://app.heco.si/login">Prio-App</a></div>
            </div>
        </div>
        <div class="py-2 my-10 text-gray-500 border">
            {{$name ?? 'default'}}
        </div>
    {{$slot}}
</body>
</html>
