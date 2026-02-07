@extends('layouts.dashboard')

@section('title', 'Connect Accounts')

@section('content')
    <div class="max-w-7xl mx-auto space-y-10 animate-in fade-in slide-in-from-bottom-6 duration-1000" :class="rtl ? 'font-arabic' : 'font-sans'">
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div>
                <h1 class="text-3xl font-black mb-2" x-text="rtl ? 'ربط القنوات الذكية' : 'Smart Channels Connection'"></h1>
                <p class="text-gray-500 font-medium" x-text="rtl ? 'ضع مفتاح الوصول وسنقوم بجلب كافة صفحاتك وحساباتك تلقائياً' : 'Provide your access token and we\\'ll discover all your pages & accounts automatically'"></p>
            </div>
        </div>

        <!-- Token Entry Section -->
        <div class="bg-white dark:bg-slate-900/50 p-10 rounded-[3rem] border border-gray-100 dark:border-white/5 space-y-8">
            <div class="space-y-2">
                <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest px-2" x-text="rtl ? 'مفتاح الوصول (User Access Token)' : 'User Access Token'"></label>
                <div class="flex flex-col md:flex-row gap-4">
                    <input type="password" id="accessToken" placeholder="EAA..."
                        class="flex-grow h-16 bg-gray-50 dark:bg-slate-800/50 border-2 border-transparent focus:border-indigo-500/30 px-6 rounded-2xl outline-none dark:text-white transition-all font-mono text-sm">
                    <button onclick="fetchAccounts()"
                        class="px-10 h-16 bg-indigo-600 text-white font-black rounded-2xl shadow-xl shadow-indigo-600/30 hover:scale-105 active:scale-95 transition-all flex items-center justify-center gap-3 whitespace-nowrap">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                        <span id="btnText" x-text="rtl ? 'جلب الحسابات' : 'Fetch Accounts'"></span>
                    </button>
                </div>
                <p id="errorMsg" class="text-xs text-red-500 px-2 font-bold hidden"></p>
                <p id="successMsg" class="text-xs text-green-500 px-2 font-bold hidden"></p>
                
                <!-- Progress Bar -->
                <div id="progressContainer" class="hidden mt-4">
                    <div class="flex items-center justify-between mb-2">
                        <span id="progressText" class="text-xs font-bold text-indigo-600"></span>
                        <span id="progressPercent" class="text-xs font-bold text-indigo-600">0%</span>
                    </div>
                    <div class="w-full h-2 bg-gray-200 dark:bg-slate-700 rounded-full overflow-hidden">
                        <div id="progressBar" class="h-full bg-gradient-to-r from-indigo-500 to-purple-500 transition-all duration-500 ease-out" style="width: 0%"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Connected Accounts Cards -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Facebook Pages Card -->
            <div class="bg-white dark:bg-slate-900/50 rounded-[3rem] border border-gray-100 dark:border-white/5 overflow-hidden">
                <div class="p-8 border-b dark:border-white/5">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-xl bg-blue-600 text-white flex items-center justify-center">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-black" x-text="rtl ? 'صفحات فيسبوك' : 'Facebook Pages'"></h3>
                                <p class="text-xs text-gray-500"><span id="fbCount">0</span> <span x-text="rtl ? 'صفحة' : 'pages'"></span></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="facebookPages" class="p-6 space-y-3 max-h-[500px] overflow-y-auto custom-scrollbar">
                    <p class="text-gray-400 text-sm text-center py-8" x-text="rtl ? 'لم يتم تحميل أي صفحات بعد' : 'No pages loaded yet'"></p>
                </div>
            </div>

            <!-- Instagram Accounts Card -->
            <div class="bg-white dark:bg-slate-900/50 rounded-[3rem] border border-gray-100 dark:border-white/5 overflow-hidden">
                <div class="p-8 border-b dark:border-white/5">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-xl bg-gradient-to-tr from-yellow-400 via-pink-500 to-purple-600 text-white flex items-center justify-center">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-black" x-text="rtl ? 'حسابات إنستجرام' : 'Instagram Accounts'"></h3>
                                <p class="text-xs text-gray-500"><span id="igCount">0</span> <span x-text="rtl ? 'حساب' : 'accounts'"></span></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="instagramAccounts" class="p-6 space-y-3 max-h-[500px] overflow-y-auto custom-scrollbar">
                    <p class="text-gray-400 text-sm text-center py-8" x-text="rtl ? 'لم يتم تحميل أي حسابات بعد' : 'No accounts loaded yet'"></p>
                </div>
            </div>
        </div>
    </div>

    <style>
        .custom-scrollbar::-webkit-scrollbar {
            width: 8px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: rgba(99, 102, 241, 0.3);
            border-radius: 10px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: rgba(99, 102, 241, 0.5);
        }
    </style>

    <script>
        let accountsData = {
            facebook: {},
            instagram: {}
        };

        // Get RTL state from Alpine
        function isRTL() {
            return localStorage.getItem('rtl') === 'true';
        }

        // Load saved accounts on page load
        window.addEventListener('DOMContentLoaded', function() {
            loadSavedAccounts();
        });

        async function loadSavedAccounts() {
            try {
                const response = await fetch('/api/accounts/connected');
                const data = await response.json();
                
                if (data.success) {
                    if (data.data.facebook.length > 0 || data.data.instagram.length > 0) {
                        renderFacebookPages(data.data.facebook, true);
                        renderInstagramAccounts(data.data.instagram, true);
                    }
                }
            } catch (error) {
                console.log('No saved accounts found');
            }
        }

        function updateProgress(percent, text) {
            const progressContainer = document.getElementById('progressContainer');
            const progressBar = document.getElementById('progressBar');
            const progressPercent = document.getElementById('progressPercent');
            const progressText = document.getElementById('progressText');
            
            progressContainer.classList.remove('hidden');
            progressBar.style.width = percent + '%';
            progressPercent.textContent = percent + '%';
            progressText.textContent = text;
        }

        function hideProgress() {
            const progressContainer = document.getElementById('progressContainer');
            progressContainer.classList.add('hidden');
        }

        async function fetchAccounts() {
            const accessToken = document.getElementById('accessToken').value;
            const btnText = document.getElementById('btnText');
            const errorMsg = document.getElementById('errorMsg');
            const successMsg = document.getElementById('successMsg');
            const rtl = isRTL();
            
            if (!accessToken) {
                errorMsg.textContent = rtl ? 'الرجاء إدخال مفتاح الوصول' : 'Please enter access token';
                errorMsg.classList.remove('hidden');
                return;
            }
            
            btnText.textContent = rtl ? 'جاري الجلب...' : 'Fetching...';
            errorMsg.classList.add('hidden');
            successMsg.classList.add('hidden');
            
            // Show progress
            updateProgress(10, rtl ? 'جاري الاتصال بـ Facebook...' : 'Connecting to Facebook...');
            
            try {
                updateProgress(30, rtl ? 'جاري جلب الصفحات...' : 'Fetching pages...');
                
                const response = await fetch('/api/accounts/fetch', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({ access_token: accessToken })
                });
                
                updateProgress(70, rtl ? 'جاري معالجة البيانات...' : 'Processing data...');
                
                const data = await response.json();
                
                if (data.success) {
                    updateProgress(90, rtl ? 'جاري عرض النتائج...' : 'Rendering results...');
                    
                    renderFacebookPages(data.data.facebook, false);
                    renderInstagramAccounts(data.data.instagram, false);
                    
                    updateProgress(100, rtl ? 'تم بنجاح!' : 'Complete!');
                    
                    setTimeout(() => {
                        hideProgress();
                        const fbCount = data.data.facebook.length;
                        const igCount = data.data.instagram.length;
                        successMsg.textContent = rtl 
                            ? `تم العثور على ${fbCount} صفحة فيسبوك و ${igCount} حساب إنستجرام!`
                            : `Found ${fbCount} Facebook pages and ${igCount} Instagram accounts!`;
                        successMsg.classList.remove('hidden');
                    }, 500);
                } else {
                    hideProgress();
                    errorMsg.textContent = data.message || (rtl ? 'فشل في جلب الحسابات' : 'Failed to fetch accounts');
                    errorMsg.classList.remove('hidden');
                }
            } catch (error) {
                hideProgress();
                errorMsg.textContent = rtl ? 'حدث خطأ في الاتصال: ' + error.message : 'Connection error: ' + error.message;
                errorMsg.classList.remove('hidden');
            } finally {
                btnText.textContent = rtl ? 'جلب الحسابات' : 'Fetch Accounts';
            }
        }
        
        function renderFacebookPages(pages, fromDatabase = false) {
            const container = document.getElementById('facebookPages');
            const countEl = document.getElementById('fbCount');
            const rtl = isRTL();
            
            container.innerHTML = '';
            countEl.textContent = pages.length;
            
            if (pages.length === 0) {
                container.innerHTML = `<p class="text-gray-400 text-sm text-center py-8">${rtl ? 'لم يتم العثور على صفحات فيسبوك' : 'No Facebook pages found'}</p>`;
                return;
            }
            
            pages.forEach(page => {
                const pageId = fromDatabase ? page.platform_id : page.id;
                const isActive = fromDatabase ? page.is_active : false;
                
                accountsData.facebook[pageId] = {
                    id: pageId,
                    name: page.name,
                    access_token: page.access_token,
                    metadata: page.metadata || {},
                    is_active: isActive
                };
                
                const div = document.createElement('div');
                div.className = 'p-4 rounded-2xl bg-gray-50 dark:bg-slate-800/30 border border-transparent hover:border-indigo-500/20 transition-all flex items-center justify-between';
                div.innerHTML = `
                    <div class="flex items-center gap-3 flex-grow min-w-0">
                        <div class="w-10 h-10 rounded-xl bg-blue-600 text-white flex items-center justify-center text-xs font-black flex-shrink-0">FB</div>
                        <div class="min-w-0 flex-grow">
                            <h4 class="font-bold text-sm truncate">${page.name}</h4>
                            <p class="text-[10px] text-gray-500 font-mono">ID: ${pageId}</p>
                        </div>
                    </div>
                    <div class="w-12 h-6 rounded-full p-1 cursor-pointer transition-all duration-300 flex-shrink-0 ${rtl ? 'mr-3' : 'ml-3'} ${isActive ? 'bg-indigo-600' : 'bg-gray-300 dark:bg-slate-700'}"
                         onclick="toggleAccount('facebook', '${pageId}', this, event)">
                        <div class="w-4 h-4 bg-white rounded-full transition-all duration-300 shadow-sm ${isActive ? (rtl ? '-translate-x-6' : 'translate-x-6') : ''}"></div>
                    </div>
                `;
                container.appendChild(div);
            });
        }
        
        function renderInstagramAccounts(accounts, fromDatabase = false) {
            const container = document.getElementById('instagramAccounts');
            const countEl = document.getElementById('igCount');
            const rtl = isRTL();
            
            container.innerHTML = '';
            countEl.textContent = accounts.length;
            
            if (accounts.length === 0) {
                container.innerHTML = `<p class="text-gray-400 text-sm text-center py-8">${rtl ? 'لم يتم العثور على حسابات إنستجرام' : 'No Instagram accounts found'}</p>`;
                return;
            }
            
            accounts.forEach(account => {
                const accountId = fromDatabase ? account.platform_id : account.id;
                const isActive = fromDatabase ? account.is_active : false;
                
                accountsData.instagram[accountId] = {
                    id: accountId,
                    name: account.name,
                    access_token: account.access_token,
                    metadata: account.metadata || {},
                    is_active: isActive
                };
                
                const div = document.createElement('div');
                div.className = 'p-4 rounded-2xl bg-gray-50 dark:bg-slate-800/30 border border-transparent hover:border-indigo-500/20 transition-all flex items-center justify-between';
                div.innerHTML = `
                    <div class="flex items-center gap-3 flex-grow min-w-0">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-yellow-400 via-pink-500 to-purple-600 text-white flex items-center justify-center text-xs font-black flex-shrink-0">IG</div>
                        <div class="min-w-0 flex-grow">
                            <h4 class="font-bold text-sm truncate">${account.name}</h4>
                            <p class="text-[10px] text-gray-500 font-mono">ID: ${accountId}</p>
                        </div>
                    </div>
                    <div class="w-12 h-6 rounded-full p-1 cursor-pointer transition-all duration-300 flex-shrink-0 ${rtl ? 'mr-3' : 'ml-3'} ${isActive ? 'bg-indigo-600' : 'bg-gray-300 dark:bg-slate-700'}"
                         onclick="toggleAccount('instagram', '${accountId}', this, event)">
                        <div class="w-4 h-4 bg-white rounded-full transition-all duration-300 shadow-sm ${isActive ? (rtl ? '-translate-x-6' : 'translate-x-6') : ''}"></div>
                    </div>
                `;
                container.appendChild(div);
            });
        }
        
        async function toggleAccount(platform, accountId, toggleEl, event) {
            event.stopPropagation();
            
            const toggle = toggleEl.querySelector('div');
            const rtl = isRTL();
            
            // Check if active (works for both RTL and LTR)
            const isActive = toggle.classList.contains('translate-x-6') || toggle.classList.contains('-translate-x-6');
            const newState = !isActive;
            
            const account = accountsData[platform][accountId];
            if (!account) {
                console.error('Account not found in memory');
                return;
            }
            
            console.log('Toggle:', platform, accountId, 'from', isActive, 'to', newState);
            console.log('Account data:', account);
            
            // Update UI immediately
            if (newState) {
                toggleEl.classList.remove('bg-gray-300', 'dark:bg-slate-700');
                toggleEl.classList.add('bg-indigo-600');
                toggle.classList.remove('translate-x-6', '-translate-x-6');
                toggle.classList.add(rtl ? '-translate-x-6' : 'translate-x-6');
            } else {
                toggleEl.classList.remove('bg-indigo-600');
                toggleEl.classList.add('bg-gray-300', 'dark:bg-slate-700');
                toggle.classList.remove('translate-x-6', '-translate-x-6');
            }
            
            accountsData[platform][accountId].is_active = newState;
            
            // Save to database
            try {
                const response = await fetch('/api/accounts/toggle', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        platform: platform,
                        platform_id: accountId,
                        name: account.name,
                        access_token: account.access_token,
                        is_active: newState,
                        metadata: account.metadata
                    })
                });
                
                const data = await response.json();
                console.log('Toggle response:', data);
                
                if (!data.success) {
                    console.error('Toggle failed:', data.message);
                    // Revert UI on error
                    if (!newState) {
                        toggleEl.classList.remove('bg-gray-300', 'dark:bg-slate-700');
                        toggleEl.classList.add('bg-indigo-600');
                        toggle.classList.remove('translate-x-6', '-translate-x-6');
                        toggle.classList.add(rtl ? '-translate-x-6' : 'translate-x-6');
                    } else {
                        toggleEl.classList.remove('bg-indigo-600');
                        toggleEl.classList.add('bg-gray-300', 'dark:bg-slate-700');
                        toggle.classList.remove('translate-x-6', '-translate-x-6');
                    }
                    accountsData[platform][accountId].is_active = !newState;
                }
            } catch (error) {
                console.error('Toggle error:', error);
            }
        }
    </script>
@endsection