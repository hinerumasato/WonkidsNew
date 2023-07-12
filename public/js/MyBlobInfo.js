class MyBlobInfo {

    constructor(file) {
        this.file = file;
        this.name = file.name;
    };

    createBlob() {
        return new Promise(resolve => {
            const reader = new FileReader();
            reader.onload = () => {
                const base64 = reader.result;
                const type = base64.split(';')[0];
                const binaryString = window.atob(base64.split(',')[1]);
                const buffer = Uint8Array.from(binaryString, c => c.charCodeAt(0));
                const blob = new Blob([buffer], { type: type });
                resolve(blob);
            }
    
            reader.readAsDataURL(this.file);
        });
    }

    filename() {
        return this.name;
    };

    async blob() {
        return await this.createBlob();
    };

}