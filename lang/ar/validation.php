<?php 
return [
    'required' => 'حقل :attribute مطلوب.',
    'email' => 'يجب أن يكون :attribute عنوان بريد إلكتروني صالح.',
    'unique' => ':attribute مستخدم من قبل، الرجاء اختيار قيمة أخرى.',
    'confirmed' => 'تأكيد :attribute غير متطابق.',
    'min' => [
        'string' => 'يجب ألا يقل :attribute عن :min أحرف.',
    ],
    'max' => [
        'string' => 'يجب ألا يزيد :attribute عن :max أحرف.',
    ],
    'exists' => 'القيمة المحددة لـ :attribute غير صحيحة.',
    'numeric' => 'يجب أن يكون :attribute رقمًا.',

    // ✅ إضافة أسماء الحقول داخل نفس المصفوفة
    'attributes' => [
        'name' => 'الاسم الكامل',
        'email' => 'البريد الإلكتروني',
        'password' => 'كلمة المرور',
        'password_confirmation' => 'تأكيد كلمة المرور',
        'role' => 'الدور',
    ],
];
