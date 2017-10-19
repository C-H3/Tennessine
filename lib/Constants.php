<?php declare(strict_types=1);

namespace Tennessine;

/**
 * A class to define all the constants to be used by the library.
 * @package Tennessine
 */
class Constants {
    public const AF_INET         = 2;    /* Internet IP Protocol 	*/
    public const AF_INET6        = 10;   /* IP version 6			*/
    public const AF_UNIX         = 1;    /* Unix domain sockets 		*/

    public const SOCK_STREAM     = 1;		/* stream (connection) socket	*/
    public const SOCK_DGRAM      = 2;		/* datagram (conn.less) socket   */
    public const SOCK_RAW        = 3;		/* raw socket			         */
    public const SOCK_RDM        = 4;		/* reliably-delivered message	*/
    public const SOCK_SEQPACKET  = 5;		/* sequential packet socket	     */
    public const SOCK_PACKET     = 10;

    public const SOL_TCP         = 6;
    public const SOL_UDP         = 17;
    public const SOL_IP          = 0;
    public const SOL_IPX         = 256;
}