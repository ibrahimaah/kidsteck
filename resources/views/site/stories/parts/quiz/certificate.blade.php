@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #fce4ec;
        font-family: 'Tajawal', sans-serif;
        text-align: center;
    }

    .certificate-container {
        width: 800px;
        height: 600px;
        margin: 50px auto;
        padding: 20px;
        background: white;
        border: 10px solid #2575fc;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        position: relative;
    }

    .certificate-header {
        font-size: 24px;
        font-weight: bold;
        color: #2575fc;
        margin-bottom: 20px;
    }

    .certificate-title {
        font-size: 36px;
        font-weight: bold;
        color: #ff5733;
    }

    .certificate-body {
        font-size: 20px;
        margin-top: 20px;
        color: #444;
    }

    .kid-name {
        font-size: 30px;
        font-weight: bold;
        color: #2575fc;
    }

    .story-title {
        font-size: 24px;
        font-weight: bold;
        color: #ff5733;
    }

    .completion-date {
        font-size: 18px;
        margin-top: 10px;
        color: #666;
    }

    .certificate-footer {
        position: absolute;
        bottom: 20px;
        left: 0;
        right: 0;
        font-size: 18px;
        color: #2575fc;
    }

    .logo {
        position: absolute;
        top: 20px;
        left: 20px;
        width: 150px;
    }

    .print-btn {
        margin-top: 20px;
        font-size: 18px;
        padding: 10px 20px;
        border-radius: 10px;
        background: orange;
        color: black;
        font-weight: bold;
        text-decoration: none;
        display: inline-block;
        transition: 0.3s;
    }

    .print-btn:hover {
        background: orangered;
        transform: scale(1.1);
    }
</style>

<div class="certificate-container" id="certificate">
    <img src="{{ asset('imgs/logo.png') }}" class="logo" alt="Kidsteck Logo">
    
    <div class="certificate-header">شهادة إتمام الاختبار</div>

    <div class="certificate-title">🎖 شهادة تقدير 🎖</div>

    <div class="certificate-body">
        تهانينا 🎉، <span class="kid-name">{{ auth()->user()->name }}</span>!  
        <br>لقد أكملت جميع اختبارات القصة:
        <br> <span class="story-title">{{ $story->title }}</span>
        <br>بنجاح واستحققت هذه الشهادة!
    </div>

    <div class="completion-date">📅 تاريخ الإنجاز: {{ now()->format('d-m-Y') }}</div>

    <div class="certificate-footer">Kidsteck - منصة التعلم للأطفال 🚀</div>
</div>

<button class="print-btn" onclick="printCertificate()">📄 تحميل الشهادة</button>

<script>
    function printCertificate() {
        const originalContent = document.body.innerHTML;
        const certificateContent = document.getElementById('certificate').outerHTML;

        document.body.innerHTML = certificateContent;
        window.print();
        document.body.innerHTML = originalContent;
    }
</script>
@endsection
