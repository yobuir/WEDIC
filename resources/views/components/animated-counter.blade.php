<div
    x-data="{
        counter: 0,
        target: parseInt('{{ $target }}'),
        suffix: '{{ $suffix }}'
    }"
    x-init="() => {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const duration = 2000;
                    const start = performance.now();
                    const animate = (currentTime) => {
                        const elapsed = currentTime - start;
                        const progress = Math.min(elapsed / duration, 1);

                        counter = Math.floor(target * progress);

                        if (progress < 1) {
                            requestAnimationFrame(animate);
                        }
                    };
                    requestAnimationFrame(animate);
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        observer.observe($el);
    }"
    class="text-4xl font-bold text-wedic-blue-600"
>
    <span x-text="counter"></span><span x-text="suffix"></span>
</div>
