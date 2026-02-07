@extends('layouts.auth')

@section('title', 'Login')

@section('content')
    <div class="w-full max-w-md relative group">
        <!-- Background Glow -->
        <div
            class="absolute -inset-6 bg-gradient-to-tr from-indigo-600/30 to-purple-600/30 rounded-[3rem] blur-3xl opacity-40 dark:opacity-50 animate-pulse">
        </div>

        <div class="relative glass dark:glass-dark rounded-[2.5rem] p-8 lg:p-10 shadow-2xl transition-all duration-500">
            <div
                class="bg-white dark:bg-slate-900 rounded-[2rem] p-8 lg:p-10 shadow-inner border border-gray-100 dark:border-transparent">
                <!-- Header -->
                <div class="text-center mb-10">
                    <a href="/" class="inline-block mb-6">
                        <div
                            class="text-2xl font-black bg-clip-text text-transparent bg-gradient-to-r from-indigo-600 to-pink-600">
                            <span x-text="rtl ? 'أوتوـريبلاي' : 'AutoReply'"></span>
                        </div>
                    </a>
                    <h1 class="text-2xl font-black dark:text-white" x-text="rtl ? 'تسجيل الدخول' : 'Sign In'"></h1>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-2"
                        x-text="rtl ? 'مرحباً بك مجدداً في نظامك الذكي' : 'Welcome back to your smart system'"></p>
                </div>

                <form action="#" class="space-y-6">
                    <!-- Username / Email -->
                    <div class="space-y-2">
                        <label class="px-2 text-xs font-bold text-gray-400 dark:text-gray-500 uppercase tracking-widest"
                            x-text="rtl ? 'الاسم أو البريد' : 'Username or Email'"></label>
                        <input type="text"
                            class="w-full h-14 bg-gray-50 dark:bg-slate-800/50 border-2 border-transparent focus:border-indigo-500/30 focus:bg-white dark:focus:bg-slate-800 px-6 rounded-2xl outline-none transition-all dark:text-white shadow-sm"
                            :placeholder="rtl ? 'ادخل بياناتك هنا...' : 'Enter your credentials...'">
                    </div>

                    <!-- Password -->
                    <div class="space-y-2">
                        <div class="flex justify-between px-2">
                            <label class="text-xs font-bold text-gray-400 dark:text-gray-500 uppercase tracking-widest"
                                x-text="rtl ? 'كلمة السر' : 'Password'"></label>
                            <a href="/forgot-password"
                                class="text-xs font-bold text-indigo-600 dark:text-indigo-400 hover:underline"
                                x-text="rtl ? 'نسيت كلمة السر؟' : 'Forgot?'"></a>
                        </div>
                        <input type="password"
                            class="w-full h-14 bg-gray-50 dark:bg-slate-800/50 border-2 border-transparent focus:border-indigo-500/30 focus:bg-white dark:focus:bg-slate-800 px-6 rounded-2xl outline-none transition-all dark:text-white shadow-sm"
                            placeholder="••••••••">
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center px-2">
                        <label class="flex items-center cursor-pointer group">
                            <div class="relative">
                                <input type="checkbox" class="sr-only">
                                <div
                                    class="w-5 h-5 border-2 border-gray-200 dark:border-slate-700 rounded-md bg-white dark:bg-slate-800 group-hover:border-indigo-500 transition-all">
                                </div>
                            </div>
                            <span class="ml-3 rtl:ml-0 rtl:mr-3 text-sm text-gray-500 dark:text-gray-400"
                                x-text="rtl ? 'تذكرني' : 'Remember me'"></span>
                        </label>
                    </div>

                    <!-- Submit -->
                    <button type="submit"
                        class="w-full h-16 bg-indigo-600 hover:bg-indigo-700 text-white font-black text-lg rounded-2xl shadow-xl shadow-indigo-600/30 transition-all transform hover:-translate-y-1 active:scale-95"
                        x-text="rtl ? 'دخول' : 'Sign In'"></button>
                </form>

                <div class="mt-8 text-center pt-8 border-t border-gray-100 dark:border-white/5">
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        <span x-text="rtl ? 'ليس لديك حساب؟' : 'Don\'t have an account?'"></span>
                        <a href="/register" class="font-bold text-indigo-600 dark:text-indigo-400 hover:underline"
                            x-text="rtl ? 'سجل الآن' : 'Register now'"></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection