@extends('layouts.admin')

@section('title', 'Pricing Plans')

@section('content')
    <div class="max-w-6xl mx-auto space-y-10 animate-in fade-in slide-in-from-bottom-6 duration-1000">
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div>
                <h1 class="text-3xl font-black mb-2" x-text="rtl ? 'إدارة خطط الاشتراك' : 'Subscription Plans Management'">
                </h1>
                <p class="text-gray-500 font-medium"
                    x-text="rtl ? 'تحكم في الأسعار، المميزات، وحدود استهلاك الـ AI لكل باقة' : 'Manage prices, features, and AI consumption limits for each plan'">
                </p>
            </div>
            <button
                class="px-8 py-4 bg-rose-600 text-white font-black text-sm rounded-2xl shadow-xl shadow-rose-600/20 hover:scale-105 transition-all"
                x-text="rtl ? 'إنشاء خطة جديدة' : 'Create New Plan'"></button>
        </div>

        <!-- Plans Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <template x-for="plan in [
                { name: 'Basic', price: '29', color: 'slate', hits: '1,000' },
                { name: 'Professional', price: '79', color: 'rose', hits: '5,000' },
                { name: 'Enterprise', price: '199', color: 'indigo', hits: 'Unlimited' }
            ]" :key="plan.name">
                <div
                    class="bg-white dark:bg-slate-900/50 p-8 rounded-[3rem] border border-gray-100 dark:border-white/5 space-y-6 relative overflow-hidden group">
                    <div :class="'bg-' + plan.color + '-500'" class="absolute top-0 left-0 right-0 h-2 opacity-50"></div>

                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-xl font-black" x-text="plan.name"></h3>
                            <p class="text-xs text-gray-500 font-bold uppercase tracking-widest"
                                x-text="rtl ? 'باقتك الحالية' : 'Plan Identifier'"></p>
                        </div>
                        <div class="text-right">
                            <span class="text-2xl font-black" x-text="'$' + plan.price"></span>
                            <p class="text-[10px] text-gray-400">/month</p>
                        </div>
                    </div>

                    <div class="space-y-4 pt-4">
                        <div class="flex items-center gap-3">
                            <div
                                class="w-5 h-5 rounded-full bg-emerald-500/10 text-emerald-500 flex items-center justify-center">
                                <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <span class="text-xs font-bold text-gray-600 dark:text-gray-300"><span
                                    x-text="plan.hits"></span> AI Replies</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div
                                class="w-5 h-5 rounded-full bg-emerald-500/10 text-emerald-500 flex items-center justify-center">
                                <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <span class="text-xs font-bold text-gray-600 dark:text-gray-300"
                                x-text="rtl ? 'دعم فيسبوك وإنستجرام' : 'FB & IG Integration'"></span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div
                                class="w-5 h-5 rounded-full bg-emerald-500/10 text-emerald-500 flex items-center justify-center">
                                <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <span class="text-xs font-bold text-gray-600 dark:text-gray-300"
                                x-text="rtl ? 'تحليل المشاعر' : 'Sentiment Analysis'"></span>
                        </div>
                    </div>

                    <div class="pt-6 flex gap-2">
                        <button
                            class="flex-grow py-3 bg-gray-50 dark:bg-slate-800 rounded-xl text-xs font-black hover:bg-white/5 transition-all"
                            x-text="rtl ? 'تعديل' : 'Edit Plan'"></button>
                        <button
                            class="p-3 bg-rose-500/10 text-rose-500 rounded-xl hover:bg-rose-500 transition-all hover:text-white"><svg
                                class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg></button>
                    </div>
                </div>
            </template>
        </div>
    </div>
@endsection