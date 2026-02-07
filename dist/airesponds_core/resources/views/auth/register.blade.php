@extends('layouts.auth')

@section('title', 'Register')

@section('content')
    <div class="w-full max-w-md relative group">
        <div
            class="absolute -inset-6 bg-gradient-to-tr from-indigo-600/30 to-purple-600/30 rounded-[3rem] blur-3xl opacity-40 dark:opacity-50 animate-pulse">
        </div>

        <div class="relative glass dark:glass-dark rounded-[2.5rem] p-8 lg:p-10 shadow-2xl transition-all duration-500">
            <div
                class="bg-white dark:bg-slate-900 rounded-[2rem] p-8 lg:p-10 shadow-inner border border-gray-100 dark:border-transparent">
                <div class="text-center mb-10">
                    <a href="/" class="inline-block mb-6">
                        <div
                            class="text-2xl font-black bg-clip-text text-transparent bg-gradient-to-r from-indigo-600 to-pink-600">
                            <span x-text="rtl ? 'أوتوـريبلاي' : 'AutoReply'"></span>
                        </div>
                    </a>
                    <h1 class="text-2xl font-black dark:text-white" x-text="rtl ? 'حساب جديد' : 'Create Account'"></h1>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-2"
                        x-text="rtl ? 'انضم إلى آلاف المستخدمين الأذكياء' : 'Join thousands of smart users'"></p>
                </div>

                <form action="#" class="space-y-5">
                    <!-- Name -->
                    <div class="space-y-2">
                        <label class="px-2 text-xs font-bold text-gray-400 dark:text-gray-500 uppercase tracking-widest"
                            x-text="rtl ? 'الاسم بالكامل' : 'Full Name'"></label>
                        <input type="text"
                            class="w-full h-14 bg-gray-50 dark:bg-slate-800/50 border-2 border-transparent focus:border-indigo-500/30 focus:bg-white dark:focus:bg-slate-800 px-6 rounded-2xl outline-none transition-all dark:text-white shadow-sm"
                            :placeholder="rtl ? 'مثال: محمد علي' : 'e.g. John Doe'">
                    </div>

                    <!-- Email -->
                    <div class="space-y-2">
                        <label class="px-2 text-xs font-bold text-gray-400 dark:text-gray-500 uppercase tracking-widest"
                            x-text="rtl ? 'البريد الإلكتروني' : 'Email Address'"></label>
                        <input type="email"
                            class="w-full h-14 bg-gray-50 dark:bg-slate-800/50 border-2 border-transparent focus:border-indigo-500/30 focus:bg-white dark:focus:bg-slate-800 px-6 rounded-2xl outline-none transition-all dark:text-white shadow-sm"
                            placeholder="email@example.com">
                    </div>

                    <!-- Password -->
                    <div class="space-y-2">
                        <label class="px-2 text-xs font-bold text-gray-400 dark:text-gray-500 uppercase tracking-widest"
                            x-text="rtl ? 'كلمة السر' : 'Password'"></label>
                        <input type="password"
                            class="w-full h-14 bg-gray-50 dark:bg-slate-800/50 border-2 border-transparent focus:border-indigo-500/30 focus:bg-white dark:focus:bg-slate-800 px-6 rounded-2xl outline-none transition-all dark:text-white shadow-sm"
                            placeholder="••••••••">
                    </div>

                    <!-- Submit -->
                    <button type="submit"
                        class="w-full h-16 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-black text-lg rounded-2xl shadow-xl shadow-indigo-600/30 transition-all transform hover:-translate-y-1 active:scale-95"
                        x-text="rtl ? 'إنشاء حساب' : 'Register Now'"></button>
                </form>

                <div class="mt-8 text-center pt-8 border-t border-gray-100 dark:border-white/5">
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        <span x-text="rtl ? 'لديك حساب بالفعل؟' : 'Already have an account?'"></span>
                        <a href="/login" class="font-bold text-indigo-600 dark:text-indigo-400 hover:underline"
                            x-text="rtl ? 'دخول' : 'Sign In'"></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection