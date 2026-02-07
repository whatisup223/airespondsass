@extends('layouts.dashboard')

@section('title', 'My Profile')

@section('content')
    <div class="max-w-5xl mx-auto space-y-10 animate-in fade-in slide-in-from-bottom-6 duration-1000">
        <!-- Header -->
        <div>
            <h1 class="text-3xl font-black mb-2" x-text="rtl ? 'الملف الشخصي والإعدادات' : 'Profile & Settings'"></h1>
            <p class="text-gray-500 font-medium"
                x-text="rtl ? 'أدر بياناتك الشخصية وطرق استقبال التنبيهات الذكية' : 'Manage your personal info and smart notification methods'">
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            <!-- Left: Basic Info -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Profile Form -->
                <div
                    class="bg-white dark:bg-slate-900/50 p-8 rounded-[2.5rem] border border-gray-100 dark:border-white/5 space-y-8">
                    <div class="flex items-center gap-6">
                        <div class="relative group">
                            <div
                                class="w-24 h-24 rounded-[2rem] bg-gradient-to-tr from-indigo-500 to-pink-500 flex items-center justify-center text-3xl font-black text-white shadow-2xl shadow-indigo-500/20">
                                MA</div>
                            <button
                                class="absolute -bottom-2 -right-2 w-10 h-10 rounded-xl bg-white dark:bg-slate-800 shadow-lg border border-gray-100 dark:border-white/10 flex items-center justify-center text-gray-400 hover:text-indigo-500 transition-all">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </button>
                        </div>
                        <div>
                            <h3 class="text-xl font-black mb-1">Mohamed Ali</h3>
                            <p class="text-xs text-gray-500 font-bold uppercase tracking-widest"
                                x-text="rtl ? 'عضوية احترافية' : 'Pro Member Status'"></p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-1">
                            <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest px-2"
                                x-text="rtl ? 'الاسم بالكامل' : 'Full Name'"></label>
                            <input type="text" value="Mohamed Ali"
                                class="w-full h-14 bg-gray-50 dark:bg-slate-800/50 border-2 border-transparent focus:border-indigo-500/30 px-6 rounded-2xl outline-none dark:text-white transition-all">
                        </div>
                        <div class="space-y-1">
                            <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest px-2"
                                x-text="rtl ? 'البريد الإلكتروني' : 'Email Address'"></label>
                            <input type="email" value="m.ali@example.com"
                                class="w-full h-14 bg-gray-50 dark:bg-slate-800/50 border-2 border-transparent focus:border-indigo-500/30 px-6 rounded-2xl outline-none dark:text-white transition-all">
                        </div>
                    </div>

                    <div class="pt-6 border-t dark:border-white/5">
                        <button
                            class="px-8 py-4 bg-indigo-600 text-white font-black rounded-2xl shadow-xl shadow-indigo-600/30 hover:scale-105 transition-all"
                            x-text="rtl ? 'تحديث البيانات' : 'Update Profile'"></button>
                    </div>
                </div>

                <!-- Handover Notifications -->
                <div
                    class="bg-white dark:bg-slate-900/50 p-8 rounded-[2.5rem] border border-gray-100 dark:border-white/5 space-y-8">
                    <div class="flex items-center gap-4 mb-2">
                        <div class="w-12 h-12 rounded-2xl bg-pink-500/10 text-pink-500 flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-black" x-text="rtl ? 'تنبيهات التدخل البشري' : 'Human Handover Alerts'">
                            </h3>
                            <p class="text-xs text-gray-500"
                                x-text="rtl ? 'احصل على تنبيه فور احتياج العميل للرد يدوياً' : 'Get notified immediately when a customer needs manual help'">
                            </p>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <!-- WhatsApp Toggle -->
                        <div
                            class="flex items-center justify-between p-6 rounded-3xl bg-gray-50 dark:bg-slate-800/30 border border-transparent hover:border-indigo-500/20 transition-all">
                            <div class="flex items-center gap-4">
                                <div
                                    class="w-10 h-10 rounded-xl bg-green-500 text-white flex items-center justify-center shadow-lg shadow-green-500/20">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.463 1.065 2.877 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                                    </svg>
                                </div>
                                <div>
                                    <h5 class="font-bold mb-0.5" x-text="rtl ? 'تنبيهات الواتساب' : 'WhatsApp Alerts'"></h5>
                                    <p class="text-[11px] text-gray-500"
                                        x-text="rtl ? 'استقبل رابط المحادثة فوراً على هاتفك' : 'Instant chat links directly to your phone'">
                                    </p>
                                </div>
                            </div>
                            <div x-data="{ on: true }" @click="on = !on"
                                class="w-14 h-8 rounded-full p-1 cursor-pointer transition-all duration-300"
                                :class="on ? 'bg-green-500' : 'bg-gray-200 dark:bg-slate-700'">
                                <div class="w-6 h-6 bg-white rounded-full shadow-md transform transition-all duration-300"
                                    :class="on ? (rtl ? '-translate-x-6' : 'translate-x-6') : ''"></div>
                            </div>
                        </div>

                        <div class="space-y-1 px-4">
                            <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest px-2"
                                x-text="rtl ? 'رقم الواتساب (بالصيغة الدولية)' : 'WhatsApp Number (Intl Format)'"></label>
                            <input type="text" placeholder="+966 50 000 0000"
                                class="w-full h-14 bg-gray-50 dark:bg-slate-800/50 border-2 border-transparent focus:border-green-500/30 px-6 rounded-2xl outline-none dark:text-white transition-all">
                        </div>

                        <!-- Email Toggle -->
                        <div
                            class="flex items-center justify-between p-6 rounded-3xl bg-gray-50 dark:bg-slate-800/30 border border-transparent hover:border-indigo-500/20 transition-all">
                            <div class="flex items-center gap-4">
                                <div
                                    class="w-10 h-10 rounded-xl bg-indigo-500 text-white flex items-center justify-center shadow-lg shadow-indigo-500/20">
                                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <h5 class="font-bold mb-0.5" x-text="rtl ? 'تنبيهات البريد' : 'Email Alerts'"></h5>
                                    <p class="text-[11px] text-gray-500"
                                        x-text="rtl ? 'ملخصات للمحادثات التقنية والشكاوى' : 'Daily summaries & complaint logs'">
                                    </p>
                                </div>
                            </div>
                            <div x-data="{ on: true }" @click="on = !on"
                                class="w-14 h-8 rounded-full p-1 cursor-pointer transition-all duration-300"
                                :class="on ? 'bg-indigo-500' : 'bg-gray-200 dark:bg-slate-700'">
                                <div class="w-6 h-6 bg-white rounded-full shadow-md transform transition-all duration-300"
                                    :class="on ? (rtl ? '-translate-x-6' : 'translate-x-6') : ''"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right: Usage & Plan -->
            <div class="space-y-8">
                <div
                    class="bg-indigo-600 p-8 rounded-[3rem] shadow-2xl shadow-indigo-600/30 text-white space-y-6 relative overflow-hidden">
                    <div class="absolute -right-10 -bottom-10 opacity-10">
                        <svg class="w-48 h-48" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-xs font-black uppercase tracking-widest text-indigo-200 mb-1"
                                x-text="rtl ? 'الخطة الحالية' : 'Current Plan'"></p>
                            <h3 class="text-3xl font-black">Pro Agency</h3>
                        </div>
                        <span
                            class="px-3 py-1 bg-white/20 rounded-lg text-[10px] font-bold uppercase tracking-tighter shadow-sm"
                            x-text="rtl ? 'نشط' : 'Active'"></span>
                    </div>

                    <div class="space-y-4">
                        <div class="space-y-2">
                            <div class="flex justify-between text-xs font-bold">
                                <span x-text="rtl ? 'استهلاك الردود الذكية' : 'AI Replies Usage'"></span>
                                <span>1,284 / 5,000</span>
                            </div>
                            <div class="w-full h-2 bg-indigo-900/30 rounded-full overflow-hidden border border-white/5">
                                <div class="h-full bg-white rounded-full" style="width: 25.6%"></div>
                            </div>
                        </div>
                    </div>

                    <button
                        class="w-full py-4 bg-white text-indigo-600 font-black rounded-2xl shadow-lg hover:scale-105 transition-all"
                        x-text="rtl ? 'ترقية الخطة' : 'Upgrade Plan'"></button>
                </div>

                <!-- Security Box -->
                <div
                    class="bg-white dark:bg-slate-900/50 p-8 rounded-[2.5rem] border border-gray-100 dark:border-white/5 space-y-6">
                    <h3 class="text-xl font-black" x-text="rtl ? 'الأمان' : 'Security'"></h3>
                    <button
                        class="w-full py-3 px-4 rounded-xl border border-gray-100 dark:border-white/5 text-sm font-bold flex items-center justify-between group hover:bg-white/5 transition-all">
                        <span x-text="rtl ? 'تغيير كلمة السر' : 'Change Password'"></span>
                        <svg class="w-4 h-4 rtl:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                    <button
                        class="w-full py-3 px-4 rounded-xl border border-red-500/10 text-red-500 text-sm font-bold flex items-center justify-between hover:bg-red-500/5 transition-all">
                        <span x-text="rtl ? 'تسجيل الخروج' : 'Logout Account'"></span>
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection