<?php
/**
 * @file
 * Contains Pantheon\Terminus\Commands\Auth\SSHKey\AddCommand
 */


namespace Pantheon\Terminus\Commands\Auth\SSHKey;


use Pantheon\Terminus\Commands\TerminusCommand;

class AddCommand extends TerminusCommand {

  /**
   * Add a SSH key to your account
   *
   * @authorized
   *
   * @command auth:ssh-key:add
   * @aliases ssh-key:add
   *
   * @param string $file The path to the SSH public key file to use
   *
   * @usage terminus auth:ssh-key:add ~/.ssh/id_rsa.pub
   *   Adds the public key at the given file path to your account
   */
  public function delete($file) {
    $user = $this->session()->getUser();
    $user->ssh_keys->addKey($file);
    $this->log()->notice('Added SSH key from file {file}.', compact('file'));
  }
}