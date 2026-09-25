<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Tasks' }} | Tasks</title>
    <style>
        :root { --ink: #f4f6f7; --muted: #a8b0b7; --line: #30363b; --paper: #000000; --card: #111315; --soft: #252b2f; --accent: #9ed8e5; --danger: #ef8b7d; }
        * { box-sizing: border-box; }
        body { margin: 0; background: var(--paper); color: var(--ink); font-family: 'Trebuchet MS', Arial, sans-serif; }
        a { color: inherit; }
        .shell { width: min(1100px, calc(100% - 40px)); margin: 0 auto; }
        .topbar { border-bottom: 1px solid var(--line); background: var(--paper); }
        .topbar-inner { min-height: 64px; display: flex; align-items: center; justify-content: space-between; gap: 20px; }
        .brand { text-decoration: none; font-size: 1.05rem; font-weight: bold; }
        .brand-mark { display: inline-block; width: 8px; height: 8px; margin-right: 7px; background: var(--accent); border-radius: 50%; }
        .main { padding: 42px 0 70px; }
        .eyebrow { color: var(--accent); font: 700 .7rem/1.2 Arial, sans-serif; letter-spacing: .1em; text-transform: uppercase; }
        h1, h2, p { margin-top: 0; }
        h1 { margin-bottom: 8px; font-size: clamp(2rem, 4vw, 3rem); line-height: 1.05; letter-spacing: 0; }
        h2 { font-size: 1.1rem; margin-bottom: 5px; }
        .intro { max-width: 520px; margin-bottom: 30px; color: var(--muted); font: .9rem/1.5 Arial, sans-serif; }
        .button { border: 0; border-radius: 3px; background: var(--ink); color: #000; cursor: pointer; display: inline-block; padding: 10px 14px; font: 700 .76rem Arial, sans-serif; text-decoration: none; transition: background .18s ease, border-color .18s ease, color .18s ease; }
        .button:hover { background: var(--accent); }
        .button.secondary { background: transparent; border: 1px solid var(--line); color: var(--ink); }
        .button.secondary:hover { border-color: var(--accent); color: var(--accent); }
        .button.danger { background: transparent; color: var(--danger); padding: 8px 0; }
        :focus-visible { outline: 2px solid var(--accent); outline-offset: 3px; }
        .toolbar { display: flex; align-items: end; justify-content: space-between; gap: 20px; margin-bottom: 14px; }
        .count { color: var(--muted); font: .82rem Arial, sans-serif; }
        .notice { margin-bottom: 20px; padding: 12px 14px; border: 1px solid #31535b; background: #102126; color: var(--accent); font: .82rem Arial, sans-serif; }
        .task-list { display: grid; gap: 8px; }
        .task { display: grid; grid-template-columns: 1fr auto; gap: 24px; padding: 18px 20px; border: 1px solid var(--line); background: var(--card); }
        .task.completed { opacity: .7; }
        .task.completed h2 { text-decoration: line-through; }
        .task h2 { margin: 0 0 8px; }
        .task-id { margin-bottom: 8px; color: var(--muted); font: .7rem Arial, sans-serif; letter-spacing: .04em; }
        .description { margin-bottom: 14px; color: var(--muted); font: .92rem/1.5 Arial, sans-serif; white-space: pre-line; }
        .meta { display: flex; flex-wrap: wrap; gap: 10px 18px; color: var(--muted); font: .76rem Arial, sans-serif; }
        .status { align-self: start; border-radius: 3px; padding: 6px 8px; background: var(--soft); color: var(--accent); font: 700 .68rem Arial, sans-serif; text-transform: uppercase; letter-spacing: .05em; }
        .status.completed { background: #f0f0f0; color: var(--muted); }
        .actions { display: flex; align-items: center; gap: 14px; margin-top: 17px; }
        .empty { border: 1px dashed #b8c2c5; padding: 44px 20px; text-align: center; color: var(--muted); font: .95rem Arial, sans-serif; }
        .form-wrap { max-width: 620px; }
        .form-card { padding: 24px; border: 1px solid var(--line); background: var(--card); }
        .readonly-field { margin-bottom: 19px; padding: 12px; border: 1px solid var(--line); background: var(--soft); color: var(--muted); font: .9rem Arial, sans-serif; }
        label { display: block; margin-bottom: 7px; font: 700 .78rem Arial, sans-serif; }
        input, textarea, select { width: 100%; border: 1px solid var(--line); border-radius: 2px; padding: 12px; margin-bottom: 19px; background: #191c1f; color: var(--ink); font: 1rem Arial, sans-serif; transition: border-color .18s ease, box-shadow .18s ease; }
        input:focus, textarea:focus, select:focus { border-color: var(--accent); box-shadow: 0 0 0 3px rgba(158, 216, 229, .12); outline: 0; }
        textarea { min-height: 130px; resize: vertical; }
        .field-error { margin: -13px 0 15px; color: var(--danger); font: .78rem Arial, sans-serif; }
        @media (max-width: 640px) { .shell { width: min(100% - 28px, 1100px); } .main { padding-top: 38px; } .task { grid-template-columns: 1fr; gap: 12px; } .toolbar { align-items: start; flex-direction: column; } .topbar-inner { min-height: 64px; } .actions { flex-wrap: wrap; } }
    </style>
</head>
<body>
    <header class="topbar">
        <div class="shell topbar-inner">
            <a class="brand" href="{{ route('tasks.index') }}"><span class="brand-mark"></span>Tasks</a>
            <a class="button" href="{{ route('tasks.create') }}">+ Add task</a>
        </div>
    </header>
    <main class="shell main">
        @if (session('success'))
            <div class="notice">{{ session('success') }}</div>
        @endif
        @yield('content')
    </main>
</body>
</html>
