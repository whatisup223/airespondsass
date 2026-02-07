# تفعيل ربط الحسابات الحقيقي - Real Account Connection Setup

## الخطوات المطلوبة:

### 1️⃣ تشغيل Migration لإنشاء جدول الحسابات المتصلة

افتح **Laragon Terminal** أو **Command Prompt** في مجلد المشروع وقم بتشغيل:

```bash
php artisan migrate
```

هذا سيقوم بإنشاء جدول `connected_accounts` في قاعدة البيانات.

---

### 2️⃣ الحصول على Facebook User Access Token

للحصول على Access Token حقيقي:

1. اذهب إلى: https://developers.facebook.com/tools/explorer/
2. اختر التطبيق الخاص بك (أو أنشئ تطبيق جديد)
3. اطلب الصلاحيات التالية:
   - `pages_show_list`
   - `pages_read_engagement`
   - `pages_manage_metadata`
   - `pages_messaging`
   - `instagram_basic`
   - `instagram_manage_messages`
   - `instagram_manage_comments`

4. اضغط على **"Generate Access Token"**
5. انسخ الـ Token

---

### 3️⃣ اختبار الربط

1. افتح الصفحة: http://127.0.0.1:8000/user/accounts
2. الصق الـ Access Token في الخانة
3. اضغط على **"Fetch Accounts"**
4. سيتم جلب كل صفحات الفيسبوك وحسابات الإنستجرام المرتبطة بحسابك
5. فعّل/أوقف أي حساب باستخدام الـ Toggle Switch
6. سيتم حفظ الحسابات المفعلة في قاعدة البيانات

---

### 4️⃣ التحقق من البيانات المحفوظة

يمكنك التحقق من الحسابات المحفوظة في قاعدة البيانات:

```sql
SELECT * FROM connected_accounts;
```

---

## الملفات التي تم إنشاؤها:

### Backend:
- ✅ `database/migrations/2026_02_07_000001_create_connected_accounts_table.php` - Migration
- ✅ `app/Models/ConnectedAccount.php` - Model
- ✅ `app/Http/Controllers/AccountConnectionController.php` - Controller
- ✅ `routes/web.php` - API Routes

### Frontend:
- ✅ `resources/views/user/accounts.blade.php` - Updated with real API calls
- ✅ `resources/views/layouts/dashboard.blade.php` - Added CSRF token

---

## API Endpoints:

### 1. Fetch Accounts
```
POST /api/accounts/fetch
Body: { "access_token": "EAA..." }
Response: { "success": true, "data": { "facebook": [...], "instagram": [...] } }
```

### 2. Toggle Account
```
POST /api/accounts/toggle
Body: { 
  "platform": "facebook",
  "platform_id": "123456789",
  "name": "Page Name",
  "access_token": "EAA...",
  "is_active": true,
  "metadata": {...}
}
```

### 3. Get Connected Accounts
```
GET /api/accounts/connected
Response: { "success": true, "data": { "facebook": [...], "instagram": [...] } }
```

---

## ملاحظات مهمة:

1. **Access Token Expiration**: الـ Token ينتهي بعد فترة، يجب تجديده أو استخدام Long-Lived Token
2. **Security**: الـ Access Tokens محفوظة بشكل آمن في قاعدة البيانات ومخفية في الـ API responses
3. **Error Handling**: إذا فشل الـ Fetch، تحقق من:
   - صلاحية الـ Token
   - الصلاحيات المطلوبة
   - اتصال الإنترنت

---

## Next Steps:

بعد تفعيل الربط، يمكنك:
- ✅ استخدام الحسابات المفعلة في الـ Webhook
- ✅ جلب الرسائل والتعليقات من Facebook/Instagram
- ✅ الرد التلقائي باستخدام الـ AI

---

تم التنفيذ بنجاح! 🎉
