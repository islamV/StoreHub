const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});
/*  const container = document.getElementById('container');: يستخدم هذا السطر لاستهداف العنصر في الصفحة الذي يحمل معرّف "container" ويُخزّن هذا العنصر في متغير container. يُفترض أن العنصر الذي يحمل هذا المعرّف هو العنصر الرئيسي الذي يحتوي على شاشتي التسجيل وتسجيل الدخول.

    const registerBtn = document.getElementById('register');: يستخدم هذا السطر لاستهداف العنصر في الصفحة الذي يحمل معرّف "register" ويُخزّن هذا العنصر في متغير registerBtn. يُفترض أن هذا العنصر هو الزر الذي يُستخدم للتبديل إلى شاشة التسجيل.

    const loginBtn = document.getElementById('login');: يستخدم هذا السطر لاستهداف العنصر في الصفحة الذي يحمل معرّف "login" ويُخزّن هذا العنصر في متغير loginBtn. يُفترض أن هذا العنصر هو الزر الذي يُستخدم للتبديل إلى شاشة تسجيل الدخول.

    registerBtn.addEventListener('click', () => { container.classList.add("active"); });: هذا السطر يُضيف استماع لحدث النقر (click) على زر التسجيل (registerBtn). عند حدوث هذا الحدث (النقر على الزر)، يتم تشغيل الوظيفة المُعرّفة، والتي تقوم بإضافة الفئة "active" إلى العنصر الذي يحمل معرّف "container". إذا كانت هذه الفئة معرفة في أنماط CSS، فسيتم تفعيل الأنماط المرتبطة بها لتغيير عرض الصفحة.

    loginBtn.addEventListener('click', () => { container.classList.remove("active"); });: هذا السطر يُضيف استماع لحدث النقر (click) على زر تسجيل الدخول (loginBtn). عند حدوث هذا الحدث (النقر على الزر)، يتم تشغيل الوظيفة المُعرّفة، والتي تقوم بإزالة الفئة "active" من العنصر الذي يحمل معرّف "container". هذا يعني إلغاء تفعيل الأنماط المرتبطة بهذه الفئة، وبالتالي تغيير عرض الصفحة مرة أخرى.*/