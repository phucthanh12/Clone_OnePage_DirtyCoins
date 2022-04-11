function toast({title = '',
message= '',
type = 'info',
duration = 3000}) {
    const main = document.getElementById('toast');
    if(main){
        const toast = document.createElement('div');
        const delay = (duration/1000).toFixed(2);
        const effTime = 1;
        const autoRemoveId = setTimeout(function(){
            main.removeChild(toast);
        },duration + (effTime*1000));

        toast.onclick = function(e){
            if(e.target.closest('.toast__close')){
                main.removeChild(toast);
                clearTimeout(autoRemoveId);
            }
        }
        const icons = {
            success: 'fa-solid fa-circle-check',
            error: 'fa-solid fa-circle-exclamation',
            warning: 'fa-solid fa-circle-exclamation',
            info: 'fa-solid fa-circle-info',
         };
        const icon = icons[type];
        toast.style.animation = `slideInLeft ease 0.3s,fadeOut linear ${effTime}s ${delay}s forwards `;
        toast.classList.add('toast',`toast--${type}`);
        toast.innerHTML = `
            <div class="toast__icon">
                <i class="${icon}"></i>
            </div>
            <div class="toast__body">
                <h3 class="toast__title">${title}</h3>
                <div class="toast__msg">${message}</div>
            </div>
            <div class="toast__close">
                <i class="fa-solid fa-xmark"></i>
            </div>
            `;
        main.appendChild(toast);
    }
};

function showSuccesToast(){
    toast({
        title: 'Thành công',
        message: 'Bạn đã đặt hàng thành công trên DirtyCoins-đơn hàng đang được xử lý',
        type: "success",
        duration: 3000,
        });

 setTimeout(function(){
    window.location.href="index.php";
 },4000);
};