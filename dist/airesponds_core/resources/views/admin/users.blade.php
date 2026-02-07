@extends('layouts.admin')

@section('title', 'Users Management')

@section('content')
    <div class="space-y-8 animate-in fade-in slide-in-from-bottom-6 duration-1000">
        <!-- Header & Actions -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div>
                <h1 class="text-3xl font-black mb-2" x-text="rtl ? 'إدارة المستخدمين' : 'Users Management'"></h1>
                <p class="text-gray-500 font-medium"
                    x-text="rtl ? 'قائمة بجميع المشتركين وحالات استهلاكهم ومستوي العضوية' : 'View all subscribers, their consumption and plan status'">
                </p>
            </div>
            <div class="flex gap-3">
                <div class="relative">
                    <input type="text" :placeholder="rtl ? 'بحث عن مستخدم...' : 'Search users...'"
                        class="h-12 w-64 bg-white dark:bg-slate-900 border border-gray-100 dark:border-white/5 rounded-2xl px-10 text-sm outline-none focus:ring-2 focus:ring-rose-500/20 transition-all">
                    <svg class="w-4 h-4 absolute left-4 top-4 text-gray-400" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <button
                    class="px-6 py-3 bg-rose-600 text-white font-black text-sm rounded-2xl shadow-lg shadow-rose-600/20 hover:scale-105 transition-all"
                    x-text="rtl ? 'إضافة مستخدم' : 'Add New User'"></button>
            </div>
        </div>

        <!-- Users Table Card -->
        <div
            class="bg-white dark:bg-slate-900/50 rounded-[2.5rem] border border-gray-100 dark:border-white/5 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left rtl:text-right">
                    <thead>
                        <tr class="border-b dark:border-white/5">
                            <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]"
                                x-text="rtl ? 'المستخدم' : 'User Info'"></th>
                            <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]"
                                x-text="rtl ? 'الباقة' : 'Plan Type'"></th>
                            <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]"
                                x-text="rtl ? 'الاستهلاك' : 'AI Usage'"></th>
                            <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]"
                                x-text="rtl ? 'الحالة' : 'Status'"></th>
                            <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]"
                                x-text="rtl ? 'إجراءات' : 'Actions'"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y dark:divide-white/5">
                        <template x-for="i in 5" :key="i">
                            <tr class="hover:bg-rose-500/5 transition-all group">
                                <td class="px-8 py-6">
                                    <div class="flex items-center gap-4">
                                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-rose-500 to-orange-500 flex items-center justify-center text-white font-bold"
                                            x-text="i == 1 ? 'MA' : 'JD'"></div>
                                        <div>
                                            <p class="font-bold text-sm" x-text="i == 1 ? 'Mohamed Ali' : 'John Doe'"></p>
                                            <p class="text-[10px] text-gray-500" x-text="'user' + i + '@example.com'"></p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-8 py-6">
                                    <span
                                        :class="i == 1 ? 'bg-rose-500/10 text-rose-500' : 'bg-indigo-500/10 text-indigo-500'"
                                        class="px-3 py-1 rounded-lg text-[10px] font-black uppercase tracking-tighter"
                                        x-text="i == 1 ? (rtl ? 'خطة الوكالات' : 'Agency') : (rtl ? 'خطة المحترفين' : 'Pro Plan')"></span>
                                </td>
                                <td class="px-8 py-6 w-64">
                                    <div class="space-y-2">
                                        <div class="flex justify-between text-[10px] font-bold">
                                            <span x-text="1284 + (i*100) + ' / 5,000'"></span>
                                            <span x-text="25 + (i*5) + '%'"></span>
                                        </div>
                                        <div
                                            class="h-1.5 w-full bg-gray-100 dark:bg-slate-800 rounded-full overflow-hidden">
                                            <div :style="'width: ' + (25 + (i*5)) + '%'"
                                                class="h-full bg-rose-500 rounded-full"></div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-8 py-6">
                                    <div class="flex items-center gap-2">
                                        <span class="w-2 h-2 rounded-full bg-green-500"></span>
                                        <span class="text-xs font-bold" x-text="rtl ? 'نشط' : 'Active'"></span>
                                    </div>
                                </td>
                                <td class="px-8 py-6">
                                    <div class="flex items-center gap-2">
                                        <button
                                            class="w-8 h-8 rounded-lg bg-gray-50 dark:bg-slate-800 flex items-center justify-center text-gray-400 hover:text-rose-500 transition-all border border-transparent hover:border-rose-500/20">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </button>
                                        <button
                                            class="w-8 h-8 rounded-lg bg-gray-50 dark:bg-slate-800 flex items-center justify-center text-gray-400 hover:text-red-500 transition-all border border-transparent hover:border-red-500/20">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728L5.636 5.636" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>

            <!-- Pagination Placeholder -->
            <div class="px-8 py-6 border-t dark:border-white/5 flex items-center justify-between">
                <p class="text-xs text-gray-500"
                    x-text="rtl ? 'عرض 1 إلى 5 من أصل 492 مستخدم' : 'Showing 1 to 5 of 492 users'"></p>
                <div class="flex gap-2">
                    <button
                        class="w-8 h-8 rounded-lg border dark:border-white/5 flex items-center justify-center disabled:opacity-30"
                        disabled><svg class="w-4 h-4 rtl:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg></button>
                    <button class="w-8 h-8 rounded-lg border dark:border-white/5 flex items-center justify-center"><svg
                            class="w-4 h-4 rtl:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg></button>
                </div>
            </div>
        </div>
    </div>
@endsection