<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class DbBackup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:backup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Database Backup';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->process = new Process(sprintf(
                    'mysqldump -u%s -p%s %s > %s',
                    config('database.connections.mysql.username'),
                    config('database.connections.mysql.password'),
                    config('database.connections.mysql.database'),
                    storage_path('app/backup-' . Carbon::now()->format('Y-m-d') . '.gz')
                ));
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // $filename = "backup-" . Carbon::now()->format('Y-m-d') . ".gz";
        //         $command = "mysqldump --user=" . env('DB_USERNAME') ." --password=" . env('DB_PASSWORD') . " --host=" . env('DB_HOST') . " " . env('DB_DATABASE') . "  | gzip > " . storage_path() . "/app/" . $filename;
        //         $returnVar = NULL;
        //         $output  = NULL;
        //         exec($command, $output, $returnVar);
        try {
            $this->process->mustRun();
            $this->info('The backup has been proceed successfully.');
            $this->sendEmail(storage_path('app/backup-' . Carbon::now()->format('Y-m-d') . '.gz'));
        } catch (ProcessFailedException $exception) {
            $this->error('The backup process has been failed.');
        }
            
    }

    public function sendEmail($path){
       
        //recipient
        $to = 'ashokkumar2342@gmail.com';

        //sender
        $from = 'ashokkumar2342@gmail.com';
        $fromName = 'DB-backup';

        //email subject
        $subject = 'my sql backup'; 

        //attachment file path
        $file = $path;

        //email body content
        $htmlContent = '<h1>PHP Email with Attachment by CodexWorld</h1>
            <p>This email has sent from PHP script with attachment.</p>';

        //header for sender info
        $headers = "From: $fromName"." <".$from.">";

        //boundary 
        $semi_rand = md5(time()); 
        $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 

        //headers for attachment 
        $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 

        //multipart boundary 
        $message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" .
        "Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n"; 

        //preparing attachment
        if(!empty($file) > 0){
            if(is_file($file)){
                $message .= "--{$mime_boundary}\n";
                $fp =    @fopen($file,"rb");
                $data =  @fread($fp,filesize($file));

                @fclose($fp);
                $data = chunk_split(base64_encode($data));
                $message .= "Content-Type: application/octet-stream; name=\"".basename($file)."\"\n" . 
                "Content-Description: ".basename($file)."\n" .
                "Content-Disposition: attachment;\n" . " filename=\"".basename($file)."\"; size=".filesize($file).";\n" . 
                "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
            }
        }
        $message .= "--{$mime_boundary}--";
        $returnpath = "-f" . $from;

        //send email
        $mail = @mail($to, $subject, $message, $headers, $returnpath); 

        //email sending status
        echo $mail?"<h1>Mail sent.</h1>":"<h1>Mail sending failed.</h1>";
    }
}
