@extends('layouts.auth')

@section('title', 'Reset Password')

@section('content')
    <div class="w-full max-w-md relative group">
        <div
            class="absolute -inset-6 bg-gradient-to-tr from-indigo-600/30 to-purple-600/30 rounded-[3rem] blur-3xl opacity-40 dark:opacity-50 animate-pulse">
        </div>

        <div class="relative glass dark:glass-dark rounded-[2.5rem] p-8 lg:p-10 shadow-2xl transition-all duration-500">
            <div
                class="bg-white dark:bg-slate-900 rounded-[2rem] p-8 lg:p-10 shadow-inner border border-gray-100 dark:border-transparent text-center">
                <div
                    class="inline-flex w-16 h-16 rounded-2xl bg-indigo-50 dark:bg-indigo-900/30 text-indigo-600 dark:text-indigo-400 items-center justify-center mb-6">
                    <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>

                <h1 class="text-2xl font-black dark:text-white" x-text="rtl ? 'استعادة كلمة السر' : 'Forgot Password'"></h1>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-2 mb-10"
                    x-text="rtl ? 'سنرسل لك رابطاً لاستعادة حسابك' : 'We will send you a reset link'"></p>

                <form action="#" class="space-y-6">
                    <div class="space-y-2 text-left rtl:text-right">
                        <label class="px-2 text-xs font-bold text-gray-400 dark:text-gray-500 uppercase tracking-widest"
                            x-text="rtl ? 'البريد الإلكتروني' : 'Email Address'"></label>
                        <input type="email"
                            class="w-full h-14 bg-gray-50 dark:bg-slate-800/50 border-2 border-transparent focus:border-indigo-500/30 focus:bg-white dark:focus:bg-slate-800 px-6 rounded-2xl outline-none transition-all dark:text-white shadow-sm"
                            placeholder="email@example.com">
                    </div>

                    <button type="submit"
                        class="w-full h-16 bg-indigo-600 hover:bg-indigo-700 text-white font-black text-lg rounded-2xl shadow-xl shadow-indigo-600/30 transition-all transform hover:-translate-y-1 active:scale-95"
                        x-text="rtl ? 'إرسال الرابط' : 'Send Link'"></button>
                </form>

                <div class="mt-8 pt-8 border-t border-gray-100 dark:border-white/5">
                    <a href="/login"
                        class="inline-flex items-center gap-2 font-bold text-indigo-600 dark:text-indigo-400 hover:underline">
                        <svg class="w-4 h-4 rtl:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 16l-4-4m0 0l4-4m-4 4h18" />
                        </svg>
                        <span x-text="rtl ? 'العودة للدخول' : 'Back to login'"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection