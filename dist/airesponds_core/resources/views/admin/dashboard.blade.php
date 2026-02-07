@extends('layouts.admin')

@section('title', 'Admin Overview')

@section('content')
    <div class="space-y-10 animate-in fade-in duration-1000">
        <!-- Platform Stats Hub -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Total Users -->
            <div class="relative group">
                <div
                    class="absolute -inset-0.5 bg-gradient-to-r from-rose-500 to-orange-600 rounded-[2rem] blur opacity-10 group-hover:opacity-25 transition duration-500">
                </div>
                <div
                    class="relative bg-white dark:bg-slate-900/50 p-8 rounded-[2rem] border border-gray-100 dark:border-white/5">
                    <div class="flex items-center justify-between mb-6">
                        <div class="w-12 h-12 rounded-2xl bg-rose-500/10 text-rose-500 flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </div>
                    </div>
                    <h4 class="text-4xl font-black mb-1 tracking-tight">1,492</h4>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-widest"
                        x-text="rtl ? 'إجمالي المستخدمين' : 'Total Subscribed Users'"></p>
                </div>
            </div>

            <!-- Total AI Hits -->
            <div class="relative group">
                <div
                    class="absolute -inset-0.5 bg-gradient-to-r from-indigo-500 to-blue-600 rounded-[2rem] blur opacity-10 group-hover:opacity-25 transition duration-500">
                </div>
                <div
                    class="relative bg-white dark:bg-slate-900/50 p-8 rounded-[2rem] border border-gray-100 dark:border-white/5">
                    <div class="flex items-center justify-between mb-6">
                        <div
                            class="w-12 h-12 rounded-2xl bg-indigo-500/10 text-indigo-500 flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <span
                            class="text-[10px] font-black text-indigo-500 bg-indigo-500/10 px-2 py-1 rounded-lg">LIVE</span>
                    </div>
                    <h4 class="text-4xl font-black mb-1 tracking-tight">854K</h4>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-widest"
                        x-text="rtl ? 'عمليات الذكاء الاصطناعي' : 'Total AI Operations'"></p>
                </div>
            </div>

            <!-- Subscription Revenue -->
            <div class="relative group">
                <div
                    class="absolute -inset-0.5 bg-gradient-to-r from-emerald-500 to-teal-600 rounded-[2rem] blur opacity-10 group-hover:opacity-25 transition duration-500">
                </div>
                <div
                    class="relative bg-white dark:bg-slate-900/50 p-8 rounded-[2rem] border border-gray-100 dark:border-white/5">
                    <div class="flex items-center justify-between mb-6">
                        <div
                            class="w-12 h-12 rounded-2xl bg-emerald-500/10 text-emerald-500 flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <span
                            class="text-[10px] font-black text-emerald-500 bg-emerald-500/10 px-2 py-1 rounded-lg">+18%</span>
                    </div>
                    <h4 class="text-4xl font-black mb-1 tracking-tight">$42.8K</h4>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-widest"
                        x-text="rtl ? 'الإيرادات الشهرية' : 'Monthly Recurring Rev'"></p>
                </div>
            </div>

            <!-- System Health -->
            <div class="relative group">
                <div
                    class="absolute -inset-0.5 bg-gradient-to-r from-amber-500 to-orange-600 rounded-[2rem] blur opacity-10 group-hover:opacity-25 transition duration-500">
                </div>
                <div
                    class="relative bg-white dark:bg-slate-900/50 p-8 rounded-[2rem] border border-gray-100 dark:border-white/5">
                    <div class="flex items-center justify-between mb-6">
                        <div class="w-12 h-12 rounded-2xl bg-amber-500/10 text-amber-500 flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </div>
                    </div>
                    <h4 class="text-4xl font-black mb-1 tracking-tight">99.9%</h4>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-widest"
                        x-text="rtl ? 'استقرار النظام' : 'Server Uptime Status'"></p>
                </div>
            </div>
        </div>

        <!-- Analytics & Active Services -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- AI Model Status -->
            <div
                class="lg:col-span-2 bg-white dark:bg-slate-900/50 p-8 rounded-[3rem] border border-gray-100 dark:border-white/5">
                <h3 class="text-2xl font-black mb-8" x-text="rtl ? 'أداء مزودي الذكاء الاصطناعي' : 'AI Model Performance'">
                </h3>

                <div class="space-y-6">
                    <div
                        class="p-6 rounded-2xl bg-gray-50 dark:bg-slate-800/30 border border-transparent flex items-center justify-between">
                        <div class="flex items-center gap-4">
                            <div
                                class="w-10 h-10 rounded-lg bg-emerald-500 text-white flex items-center justify-center font-bold">
                                GPT</div>
                            <div>
                                <h5 class="font-bold text-sm">OpenAI GPT-4o</h5>
                                <p class="text-[10px] text-gray-500"
                                    x-text="rtl ? 'متصل - زمن الاستجابة 1.2ث' : 'Healthy - 1.2s Latency'"></p>
                            </div>
                        </div>
                        <div class="h-2 w-32 bg-gray-200 dark:bg-slate-700 rounded-full overflow-hidden">
                            <div class="h-full bg-emerald-500 rounded-full" style="width: 85%"></div>
                        </div>
                    </div>

                    <div
                        class="p-6 rounded-2xl bg-gray-50 dark:bg-slate-800/30 border border-transparent flex items-center justify-between">
                        <div class="flex items-center gap-4">
                            <div
                                class="w-10 h-10 rounded-lg bg-blue-500 text-white flex items-center justify-center font-bold">
                                GEM</div>
                            <div>
                                <h5 class="font-bold text-sm">Google Gemini Pro</h5>
                                <p class="text-[10px] text-gray-500"
                                    x-text="rtl ? 'متصل - زمن الاستجابة 0.8ث' : 'Healthy - 0.8s Latency'"></p>
                            </div>
                        </div>
                        <div class="h-2 w-32 bg-gray-200 dark:bg-slate-700 rounded-full overflow-hidden">
                            <div class="h-full bg-blue-500 rounded-full" style="width: 95%"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick System Logs -->
            <div class="bg-white dark:bg-slate-900/50 p-8 rounded-[3rem] border border-gray-100 dark:border-white/5">
                <h3 class="text-xl font-black mb-8" x-text="rtl ? 'سجل النظام اللحظي' : 'Real-time System Logs'"></h3>
                <div class="space-y-6">
                    <template x-for="i in 4" :key="i">
                        <div class="flex gap-4">
                            <div class="w-1.5 h-1.5 rounded-full mt-1.5 bg-rose-500 flex-shrink-0 animate-pulse"></div>
                            <div>
                                <p class="text-xs font-bold leading-tight"
                                    x-text="rtl ? 'اشترك مستخدم جديد في الخطة الاحترافية' : 'New Subscription: Pro Plan user #821'">
                                </p>
                                <p class="text-[10px] text-gray-500 mt-1" x-text="i + 'm ago'"></p>
                            </div>
                        </div>
                    </template>
                </div>
                <button
                    class="w-full mt-8 py-3 rounded-xl border border-rose-500/10 text-rose-500 text-[10px] font-black uppercase tracking-widest hover:bg-rose-500/5 transition-all"
                    x-text="rtl ? 'مشاهدة كافة التقارير' : 'Access Central Logs'"></button>
            </div>
        </div>
    </div>
@endsection