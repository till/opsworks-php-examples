## A couple PHP examples for OpsWorks

One of Scalarium's biggest achievements was that an instance could share a role.

So especially for smaller applications, this provides an opportunity for cost-savings.

Since OpsWorks doesn't have an interface for it yet, I whipped up some scripts using their PHP-SDK.

### setup

 * `./composer.phar install`
 * an AWS account (with key and secret)

### browse.php

```
./browse.php --key=your-aws-key --secret=your-aws-secret [--stack=the-stack-id]
```

Run without `--stack` to get a list of your stacks. Then add `--stack=foo` to drill deeper.

### instance-to-layers.php

```
./instance-to-layers.php --key=your-aws-key --secret=your-aws-secret \
--instance=the-instance-id \
--layers=the-first-layer-id,the-second-layer-id
```

In the end, it may or may not look like this:

![One api-server instance in multiple layers](http://cl.ly/image/0X0i0r2R2M0w/Screen%20Shot%202013-06-21%20at%202.29.42%20PM.png)
