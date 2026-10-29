<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Posts') - {{ config('app.name') }}</title>
    <style>
        :root { color-scheme: light; font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif; color: #172033; background: #f4f6fb; }
        * { box-sizing: border-box; }
        body { margin: 0; min-height: 100vh; }
        a { color: #4355db; text-decoration: none; }
        a:hover { text-decoration: underline; }
        .topbar { background: #fff; border-bottom: 1px solid #e6e9f2; }
        .topbar-inner, main { width: min(860px, calc(100% - 32px)); margin: 0 auto; }
        .topbar-inner { min-height: 68px; display: flex; align-items: center; justify-content: space-between; gap: 16px; }
        .brand { color: #172033; font-size: 1.05rem; font-weight: 750; letter-spacing: -.02em; }
        main { padding: 48px 0 64px; }
        .eyebrow { color: #68738a; font-size: .76rem; font-weight: 700; letter-spacing: .12em; text-transform: uppercase; }
        h1 { margin: 8px 0 10px; font-size: clamp(2rem, 5vw, 2.8rem); letter-spacing: -.045em; line-height: 1.1; }
        h2 { margin: 0; font-size: 1.3rem; letter-spacing: -.02em; }
        .intro, .post-meta { color: #68738a; line-height: 1.65; }
        .page-heading { display: flex; align-items: flex-end; justify-content: space-between; gap: 20px; margin-bottom: 28px; }
        .button { display: inline-flex; align-items: center; justify-content: center; min-height: 42px; padding: 0 16px; border: 1px solid #dfe3ef; border-radius: 9px; background: #fff; color: #29334b; font: inherit; font-size: .92rem; font-weight: 650; cursor: pointer; }
        .button:hover { background: #f7f8fc; text-decoration: none; }
        .button-primary { border-color: #4355db; background: #4355db; color: #fff; }
        .button-primary:hover { background: #3546c5; }
        .button-danger { color: #b42335; }
        .button-small { min-height: 36px; padding: 0 12px; font-size: .86rem; }
        .post-list { display: grid; gap: 14px; }
        .card, .form-card, .empty-state { border: 1px solid #e6e9f2; border-radius: 14px; background: #fff; box-shadow: 0 8px 28px rgb(23 32 51 / 4%); }
        .card { padding: 22px 24px; }
        .card h2 a { color: inherit; }
        .card-body { margin: 12px 0 18px; color: #58647c; line-height: 1.7; white-space: pre-wrap; overflow-wrap: anywhere; }
        .actions { display: flex; flex-wrap: wrap; align-items: center; gap: 8px; }
        .actions form { margin: 0; }
        .form-card { padding: clamp(20px, 5vw, 32px); }
        .field { margin-bottom: 22px; }
        label { display: block; margin-bottom: 8px; font-size: .92rem; font-weight: 700; }
        input, textarea { display: block; width: 100%; padding: 12px 13px; border: 1px solid #d9deea; border-radius: 9px; background: #fff; color: inherit; font: inherit; }
        input:focus, textarea:focus { outline: 3px solid rgb(67 85 219 / 14%); border-color: #6675e5; }
        textarea { min-height: 220px; resize: vertical; line-height: 1.6; }
        .field-error { margin: 7px 0 0; color: #b42335; font-size: .88rem; }
        .alert { margin-bottom: 20px; padding: 13px 16px; border: 1px solid #b8e3cc; border-radius: 9px; background: #edfaf2; color: #17683a; }
        .empty-state { padding: 44px 24px; text-align: center; }
        .empty-state p { margin: 10px 0 20px; color: #68738a; }
        .post-content { margin: 24px 0 30px; color: #35415a; font-size: 1.05rem; line-height: 1.85; white-space: pre-wrap; overflow-wrap: anywhere; }
        .pagination { margin-top: 22px; }
        .pagination nav { display: flex; justify-content: center; }
        .pagination p { color: #68738a; font-size: .9rem; text-align: center; }
        @media (max-width: 560px) { main { padding-top: 34px; } .page-heading { align-items: flex-start; flex-direction: column; } .topbar-inner { min-height: 58px; } }
    </style>
</head>
<body>
    <header class="topbar">
        <div class="topbar-inner">
            <a class="brand" href="{{ route('posts.index') }}">{{ config('app.name') }}</a>
            <a href="{{ route('posts.create') }}">Write a post</a>
        </div>
    </header>
    <main>
        @if (session('success'))
            <div class="alert" role="status">{{ session('success') }}</div>
        @endif
        @yield('content')
    </main>
</body>
</html>
